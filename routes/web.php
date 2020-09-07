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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('setting.cache')->group(function() {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/show', 'IndexController@show')->middleware('can.query')->name('result');
});

Route::get('/admin/login', 'Admin\AuthController@showLoginForm')->name('admin.showlogin');
Route::post('/admin/login', 'Admin\AuthController@login')->name('admin.login');
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->namespace('Admin')->group(function() {
    Route::get('/', 'IndexController@index')->name('index');
    Route::resource('company', 'CompanyController');
    Route::resource('product', 'ProductController');
    Route::resource('batch', 'BatchController');
    Route::resource('securitycode', 'SecurityCodeController');
    Route::post('upload', 'UploadController@store')->name('upload');
    Route::get('settings', 'SettingController@create')->name('setting.create');
    Route::post('settings', 'SettingController@store')->name('setting.store');
    Route::get('/history', 'HistoryController@index')->name('history.index');
    Route::post('/logout', 'AuthController@logout');
    Route::get('/password', 'PasswordController@create')->name('password');
    Route::put('/password', 'PasswordController@update')->name('password.update');
    
});
