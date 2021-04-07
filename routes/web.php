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
	Route::post('/deleteEntry','App\Http\Controllers\FrontendController@deleteEntry');
	Route::match(['get', 'post'], '/profile','App\Http\Controllers\FrontendController@profile')->name('profile');
	Route::match(['get', 'post'], '/system','App\Http\Controllers\SystemController@index');
	Route::get('/system/users','App\Http\Controllers\SystemController@users');
	Route::match(['get', 'post'], '/system/users/add','App\Http\Controllers\SystemController@usersAdd');
	Route::match(['get', 'post'], '/system/users/edit/{id}','App\Http\Controllers\SystemController@usersEdit');
	Route::get('/system/users/group','App\Http\Controllers\SystemController@usersGroup');
	Route::match(['get', 'post'], '/system/users/group/add','App\Http\Controllers\SystemController@usersGroupAdd');
	Route::get('/system/users/activity','App\Http\Controllers\SystemController@usersActivity');
	Route::get('/system/branches','App\Http\Controllers\SystemController@branches');
	Route::get('/system/branch/add','App\Http\Controllers\SystemController@branchAdd');
    Route::get('/system/users/group/{groupId}','App\Http\Controllers\SystemController@showUserGroup');
    Route::post('/system/users/group/{groupId}','App\Http\Controllers\SystemController@editUserGroup');
    
    /*===============Inventory=====================*/
    Route::get('/inventory', 'App\Http\Controllers\InventoryController@list');
    Route::match(['get', 'post'], '/inventory/add', 'App\Http\Controllers\InventoryController@add');
    Route::match(['get', 'post'], '/inventory/edit/{id}', 'App\Http\Controllers\InventoryController@edit');
    Route::match(['get', 'post'], '/inventory/search', 'App\Http\Controllers\InventoryController@search');
    Route::get('/inventory/getInventory/{id}', 'App\Http\Controllers\InventoryController@getInventory');
    Route::post('/inventory/documentUpload', 'App\Http\Controllers\InventoryController@documentUpload');
    Route::get('/inventory/getPricing/{id}', 'App\Http\Controllers\InventoryController@getPricing');
    Route::get('/inventory/transactions', 'App\Http\Controllers\InventoryController@transactions');
    Route::match(['get', 'post'], '/inventory/transactions/add', 'App\Http\Controllers\InventoryController@addTrans');
    Route::match(['get', 'post'], '/inventory/transactions/edit/{id}', 'App\Http\Controllers\InventoryController@editTrans');
});
