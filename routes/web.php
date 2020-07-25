<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


///Admins Routes

Route::get('/Admin/Register','Admin\RegisterController@register')->name('register');
Route::post('Admin/Register','Admin\RegisterController@register_submit')->name('register.submit');
Route::get('/Admin/Login','Admin\LoginController@login')->name('admin.login');
Route::post('/Admin/Login','Admin\LoginController@login_submit')->name('admin.login.submit');

Route::group(['prefix'=>'Admin','middleware'=>'admin'],function (){
    Route::get('/Logout','Admin\LoginController@logout')->name('admin.logout');
    Route::get('/','Admin\PagesController@index')->name('admin.index');
    Route::resource('blog','Admin\BlogController');
    Route::resource('roles','Admin\RolesController');
    Route::get('/AdminsRoles','Admin\RolesController@admins')->name('admins.roles');
});