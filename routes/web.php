<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reportar', 'HomeController@getreport');
Route::post('/reportar', 'HomeController@postreport');

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function() {
	// User
	Route::get('/usuarios', 'UserController@index');
	Route::post('/usuarios', 'UserController@store');

	Route::get('/usuario/{id}', 'UserController@edit');
	Route::post('/usuario/{id}', 'UserController@update');

	Route::get('/usuario/{id}/eliminar', 'UserController@delete');

	// Project
	Route::get('/proyectos', 'ProjectController@index');
	Route::post('/proyectos', 'ProjectController@store');

	Route::get('/proyecto/{id}', 'ProjectController@edit');
	Route::post('/proyecto/{id}', 'ProjectController@update');

	Route::get('/proyecto/{id}/eliminar', 'ProjectController@delete');
	Route::get('/proyecto/{id}/restaurar', 'ProjectController@restore');

	// Category
	Route::post('/categorias', 'CategoryController@store');
	Route::post('/categoria/editar', 'CategoryController@update');

	//Level
	Route::post('/niveles', 'LevelController@store');
	Route::post('/nivel/editar', 'LevelController@update');

	Route::get('/config', 'ConfigController@index');
});
