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
Route::get('report/date','HomeController@test');
Route::get('filter/ajax','HomeController@user');
Route::post('report/day','HomeController@filterReport');
Route::get('test','HomeController@test');



Route::post('create/user/ajax','HomeController@storeUser');
Route::post('edit/user/ajax','HomeController@editUser');
Route::get('delete/user/ajax','HomeController@removeUser');
Route::post('create/project/ajax','HomeController@storeProjects');
Route::get('project/edit/{id}','HomeController@editProject');
Route::post('edit/project/ajax/{id}','HomeController@changeProject');
Route::get('project/delete/ajax/{id}','HomeController@removeProject');




Route::post('user','HomeController@createUser');
Route::post('create/report','HomeController@createReport');



