<?php
/**
 * File LaravelController.php
 *
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Laravue
 * @version 1.0
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class LaravueController
 *
 * @package App\Http\Controllers
 */
class LaravueController extends Controller
{
    /**
     * Entry point for Laravue Dashboard
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome',['APP_URL'=> getenv('APP_URL')]);
    }
	public function admin()
	{
		return view('admin',['APP_URL'=> getenv('APP_URL')]);
	}
	public function wap()
	{
		return view('wap',['APP_URL'=> getenv('APP_URL')]);
	}
}
