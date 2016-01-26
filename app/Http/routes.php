<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('shifts', 'ShiftController@index');
//Route::resource('shift', ['uses' => 'ShiftController', 'middleware' => 'simpleauth']);
Route::get('shift', ['uses' => 'ShiftController@index', 'middleware' => 'simpleauth']);
Route::post('shift', ['uses' => 'ShiftController@store', 'middleware' => 'simpleauth']);
Route::get('shift/summary', ['uses' => 'ShiftController@summary', 'middleware' => 'simpleauth']);
Route::put('shift/update/{id}', ['uses' => 'ShiftController@update', 'middleware' => 'simpleauth']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
