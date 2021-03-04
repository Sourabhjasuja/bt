<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login','App\Http\Controllers\Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::post('/admin/login', 'App\Http\Controllers\Auth\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('/admin/logout', 'App\Http\Controllers\Auth\AdminAuthController@logout')->name('adminLogout');

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('/','App\Http\Controllers\AdminController@dashboard')->name('dashboard');	
	Route::get('/dashboard','App\Http\Controllers\AdminController@dashboard')->name('dashboard');	
	Route::match(['get', 'post'], '/changepass','App\Http\Controllers\AdminController@changepass')->name('changepass');	
	Route::get('/applications','App\Http\Controllers\AdminController@applications')->name('applications');	
	Route::match(['get', 'post'], '/applicant/add','App\Http\Controllers\AdminController@addApplicant')->name('addApplicant');	
	
	Route::get('/users','App\Http\Controllers\AdminController@users')->name('users');	
	Route::match(['get', 'post'], '/user/edit/{user_id}','App\Http\Controllers\AdminController@editUser')->name('editUser');	
});