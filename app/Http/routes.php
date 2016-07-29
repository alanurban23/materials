<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/measures/store', 'MeasureController@Store');
Route::get('/measures/update/{code}', 'MeasureController@update');

Route::get('/material/store', 'MaterialController@store');
Route::get('/material/update/{code}', 'MaterialController@update');

Route::get('/material-group/store', 'MaterialGroupController@store');
//Route::get('/material-group/rename/{old}', 'MaterialGroupController@rename');
Route::get('/material-group/update/{old_group}', 'MaterialGroupController@update');
