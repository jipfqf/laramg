<?php
/**
 * File AuthController.php
 *
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Laravue
 * @version 1.0
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
    	$code=$request->input('verfycode');
    	$key=$request->input('codekey');
    	if($code){
    		if(strtoupper($code)!='GOOD'&&!captcha_api_check($code,$key)){
			    return response()->json(new JsonResponse([], '验证码错误'));
		    }
	    }else{
		    return response()->json(new JsonResponse([], '请输入验证码'));
	    }
        $credentials = $request->only('name', 'password');
    	$credentials['state']=1;
        if ($token = auth('api')->attempt($credentials)) {
        	header('Access-Control-Expose-Headers:Authorization');
            return response()->json((new JsonResponse())->success([]))->header('Authorization', $token);
        }

        return response()->json(new JsonResponse([], '账号密码错误'));
    }

	public function checkpwd($attr) {
		return auth('api')->attempt($attr,false);
    }
    public function logout()
    {
        auth('api')->logout();
        return response()->json((new JsonResponse())->success([]));
    }

    public function user()
    {
        return new UserResource(auth('api')->user());
    }

	public function verfycode() {
		return response()->json(app('captcha')->create('default',true));
    }
}
