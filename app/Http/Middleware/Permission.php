<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use \App\Laravue\Models\Permission as PermisModel;
use Illuminate\Support\Facades\Cache;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	$user=Auth::user();
    	if(!$user->isAdmin()){
		    $permissions=Cache::get('permissions');
		    if(!$permissions){
			    $permissions=PermisModel::where('type',1)->get();
			    Cache::put('permissions',$permissions,60*24);
		    }
		    if($this->needCheck($request,$permissions)){
		    	$names=$user->getPermissionNames();
		    	if(!$this->checkPermis($names,$request)){
		    		return response()->json(['msg'=>'暂无权限','error'=>1]);
			    }
		    }
	    }
        return $next($request);
    }
	
	public function checkPermis($name, $request) {
    	$t=false;
		foreach ($name as $item) {
			if($item==$request->getRequestUri()){
				$t=true;
			}
    	}
		return $t;
	}
	public function needCheck($request,$permissions) {
		foreach ($permissions as $permission) {
			if($permission->name==$request->getRequestUri()){
				return true;
			}
		}
		return false;
    }
}
