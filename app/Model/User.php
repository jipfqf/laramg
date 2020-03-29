<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
	protected $table = 'users';
	protected $fillable = ['name','show_name','email','password','login_ip','last_login_ip','avatar','phone','state'];

	/**
	 * @inheritDoc
	 */
	public function getJWTIdentifier() {
		return $this->getKey();
	}
	/**
	 * @inheritDoc
	 */
	public function getJWTCustomClaims() {
		return [];
	}
	protected $hidden = [
		'password', 'remember_token',
	];
}
