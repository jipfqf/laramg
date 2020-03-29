<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\WxuserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller {
	public function fileUpload(Request $request) {
		if ($request->hasFile('file')) {
			$picture = $request->file('file');
			if (!$picture->isValid()) {
				abort(400, '无效的上传文件');
			}
			$path=$this->upfile('file',$request);
			return response()->json(['data' => $path]);
			abort(500, '文件上传失败');
		} else {
			abort(400, '请选择要上传的文件');
		}
	}

	public function upfile($key, $request) {
		$picture = $request->file($key);
		if (!$picture->isValid()) {
			return '';
		}
		$method=$request->input('method');
		// 文件扩展名
		$extension = $picture->getClientOriginalExtension();
		// 文件名
		$fileName = $picture->getClientOriginalName();
		// 生成新的统一格式的文件名
		$newFileName = md5($fileName . time() . mt_rand(1, 10000).$request->getClientIp()) . '.' . $extension;
		// 图片保存路径
		$prefix=basename($request->input('path')).'/'.date('Ymd');
		$savePath = $prefix .'/'. $newFileName;
		// 将文件保存到本地 storage/app/public/images 目录下，先判断同名文件是否已经存在，如果存在直接返回
		if (!Storage::disk('upload')->has($savePath)) {
			$picture->storePubliclyAs($prefix, $newFileName, ['disk' => 'upload']);
		}
		$savePath=self::compressImg($savePath,1,10,'',1);
		$savePath=str_replace(public_path('uploads/'),'',$savePath);
		if($method){
			$arr=explode('.',$method);
//			$action='App\Http\Controllers\Admin\\'.ucfirst($arr[0]).'Controller';
//			$action=new $action;
//			$action->$arr[1]($savePath);
			(new WxuserController())->importuser($savePath);
		}else{
			return $savePath;
		}
	}

	public static function setMemoryLimit($filename){
		// 控制执行时间
		set_time_limit(50);

		$maxMemoryUsage = '1024';
		$width = 0;
		$height = 0;
		$size = ini_get('memory_limit');

		// 获取图片大小
		list($width, $height) = getimagesize($filename);

		// 计算需要的内存，并转换成'M'单位
		// 4 因为png图片一个像素有4字节
		// 1.5 是一个调整因子，因为memory_limit不是那么精确
		// 详细可以查看: http://php.net/imagecreatefromjpeg#76968
		$size = intval($size)+ floor(($width * $height * 4 * 1.5 + 1048576) / 1048576);

		if ($size > $maxMemoryUsage){
			$size = $maxMemoryUsage;
		}

		// 更新
		ini_set('memory_limit',$size.'M');
	}
	public static function compressImg($src,$percent = 1,$ratio = 100,$path='',$rename=0){

		// 获取图片的宽高，类型,宽高字符串“height="yyy" width="xxx"”
		// $type 1 = GIF，2 = JPG，3 = PNG，4 = SWF，5 = PSD，6 = BMP......
		$src = public_path('uploads/').$src;
		// 直接返回路径
		if (!getimagesize($src)){
			return ltrim($src,'.');
		}
		self::setMemoryLimit($src);

		list($width, $height, $type, $attr) = getimagesize($src);

		//image_type_to_extension取得图像类型的文件后缀,是否在后缀名前加一个点。默认是 TRUE。
		$imageInfo = [
			'width'=>$width,
			'height'=>$height,
			'type'=>image_type_to_extension($type,false),
			'attr'=>$attr
		];

		// imagecreatefrom系列函数用于从文件或 URL 载入一幅图像。
		$fun   = "imagecreatefrom".$imageInfo['type'];
		$image = @$fun($src);
		$size=@filesize($src);
		if (!$image||$size<1024*300){
			return ltrim($src,'.');
		}
		// 新图的宽高，缩放比例
		if($imageInfo['width']>4000){
			$percent=0.5;
		}
		$newWidth = $imageInfo['width'] * $percent;
		$newHeight = $imageInfo['height'] * $percent;
		// 建立的是一幅大小为 x和 y的黑色图像(默认为黑色)，如想改变背景颜色则需要用填充颜色函数imagefill($img,0,0,$color);
		$imageThump = imagecreatetruecolor($newWidth,$newHeight);
		// 将一幅图像中的一块正方形区域拷贝到另一个图像中，平滑地插入像素值，因此，尤其是，减小了图像的大小而仍然保持了极大的清晰度。
		imagecopyresampled($imageThump,$image,0,0,0,0,$newWidth,$newHeight,$width,$height);
		// 压缩后的图片的命名，以及回存路径
		if (!empty($path)){
			$filePath = $path;
		}else{
			$filePath = substr($src,0,strrpos($src,'/'));
		}
		if($rename==1){
			$filePath = $filePath.'/small_'.substr(strrchr($src,'/'),1);
		}else{
			$filePath = $filePath.'/'.substr(strrchr($src,'/'),1);
		}


		// IOS 图片旋转问题
		// 1:0°,6:顺时针90°, 8:逆时针90°,3:180°

		if ($type == 2){
			$exif = @exif_read_data($src);
			if (isset($exif['Orientation']) && in_array($exif['Orientation'],[3,6,8])){
				if ($exif['Orientation'] == 3){
					$imageThump = imagerotate($imageThump,180,0);
				}
				if ($exif['Orientation'] == 6){
					$imageThump = imagerotate($imageThump,-90,0);
				}
				if ($exif['Orientation'] == 8){
					$imageThump = imagerotate($imageThump,90,0);
				}
			}
		}

		// 生成图片
		imagejpeg($imageThump,$filePath,$ratio);
		// 销毁
		imagedestroy($imageThump);
		imagedestroy($image);

		return ltrim($filePath,'.');
	}

	public function thumbimg() {
		$rows='20191227';
		$path=public_path('uploads/').'content/'.$rows;
//		$dirs=opendir($path);
//		while ($rows=readdir($dirs)){
//			if(is_dir($path.'/'.$rows)&&$rows!='.'&&$rows!='..'){
//				var_dump($path.'/'.$rows);
				$dir=opendir($path);
				while ($row=readdir($dir)){
					if($row!='.'&&$row!='..'){
						var_dump('content/'.$rows.'/'.$row);
						self::compressImg('content/'.$rows.'/'.$row,1,10,'',0);
					}
				}
//			}
//		}
	}
}
