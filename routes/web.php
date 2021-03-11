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


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


Route::group(['prefix' => '','middleware' => 'auth'], function () { 
	
	Route::get('/dashboard','App\Http\Controllers\FrontendController@dashboard')->name('dashboard');
	Route::match(['get', 'post'], '/profile','App\Http\Controllers\FrontendController@profile')->name('profile');
	Route::match(['get', 'post'], '/system','App\Http\Controllers\SystemController@index');
	Route::get('/system/users','App\Http\Controllers\SystemController@users');
	Route::match(['get', 'post'], '/system/users/add','App\Http\Controllers\SystemController@usersAdd');
	Route::get('/system/users/group','App\Http\Controllers\SystemController@usersGroup');
	Route::match(['get', 'post'], '/system/users/group/add','App\Http\Controllers\SystemController@usersGroupAdd');
	Route::get('/system/users/activity','App\Http\Controllers\SystemController@usersActivity');
	Route::get('/system/branches','App\Http\Controllers\SystemController@branches');
	Route::get('/system/branch/add','App\Http\Controllers\SystemController@branchAdd');
        
        Route::get('/users/group/{groupId}','App\Http\Controllers\SystemController@showUserGroup');


});
