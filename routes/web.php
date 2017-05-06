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



Auth::routes();

Route::get('logout', function (){
Auth::logout();
return redirect('report');
});

Route::get('/', function(){
	return redirect('report');
});
Route::get('report','HomeController@user');


Route::post('project','HomeController@createProject');

