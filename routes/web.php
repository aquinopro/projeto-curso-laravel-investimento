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
Route::get('/', ['uses' => 'Controller@homepage']);
Route::get('/cadastro', ['uses' => 'Controller@cadastar']);


/**
 * Routes to user auth
 * ========================================================================
 */
Route::get('/login', ['uses' => 'Controller@fazerLogin']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);

Route::get('user/moviment', ['as' => 'moviment.index', 'uses' => 'MovimentsController@index']);

Route::get('getback', ['as' => 'moviment.getback', 'uses' => 'MovimentsController@getback']);
Route::post('getback', ['as' => 'moviment.getback.store', 'uses' => 'MovimentsController@storeGetback']);

Route::get('moviment', ['as' => 'moviment.application', 'uses' => 'MovimentsController@application']);
Route::post('moviment', ['as' => 'moviment.application.store', 'uses' => 'MovimentsController@storeApplication']);

Route::get('moviment/all',['as' => 'moviment.all', 'uses' => 'MovimentsController@all']);

Route::resource('user', 'UsersController');
Route::resource('instituition', 'InstituitionsController');
Route::resource('group', 'GroupsController');
Route::resource('instituition.product', 'ProductsController');


#Route::get('group', 'GroupsController@index');
#Route::post('group', 'GroupsController@store');
#Route::get('group/{id}', 'GroupsController@show');
#Route::update('group/{id}', 'GroupsController@update');
#Route::delete('group/{id}', 'GroupsController@delete');


Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);











