<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reportar', 'HomeController@getreport');
Route::post('/reportar', 'HomeController@postreport');

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function() {
	Route::get('/usuarios', 'UserController@index');
	Route::post('/usuarios', 'UserController@store');

	Route::get('/usuario/{id}', 'UserController@edit');
	Route::post('/usuario/{id}', 'UserController@update');

	Route::get('/usuario/{id}/eliminar', 'UserController@delete');

	Route::get('/proyectos', 'ProjectController@index');

	Route::get('/config', 'ConfigController@index');
});
