<?php

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


/**
*Route cho administrator
*/
Route::prefix('admin')->group(function () {
//gom nhóm các route cho phần admin
    //url: authen.com/admin
    Route::get('/', 'Admincontroller@index')->name('admin.dashboard');
    //url: authen.com/admin/dashboard
    //ROute đăng nhập thành công
    Route::get('/dashboard','Admincontroller@index')->name('admin.dashboard');
});
/**
 *URL: authen.com/admin/register
 * Route trả về view dùng để đăng kí tài khoản admin
 */
Route::get('register','Admincontroller@create')->name('admin.register');
/**
 *URL: authen.com/admin/register
 * Phương thức là post
 * Route dùng để đăng kí 1 admin từ form Post
 */
    Route::post('register','Admincontroller@store')->name('admin.register.store');
