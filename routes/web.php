<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

// This routs only for testing
// Do not use in production
/*Route::get('index', 'AlbumController@index');
Route::get('create', 'AlbumController@create');
Route::post('store', 'AlbumController@store');
Route::get('show/{id}', 'AlbumController@show');
Route::get('edit/{id}', 'AlbumController@edit');
Route::post('update/{id}', 'AlbumController@update');
Route::get('destroy/{id}', 'AlbumController@destroy');*/

Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::post('signup', 'RegisterController@create');
    Route::resource('album', 'AlbumController', ['except' => ['create, edit']]);
});

Route::group(array('prefix' => 'api/v1'), function() {

    // since we will be using this just for CRUD, we won't need create and edit
    // Angular will handle both of those forms
    // this ensures that a user can't access api/create or api/edit when there's nothing there
    Route::resource('employees', 'Employees',
        array('only' => array('index', 'store', 'update', 'destroy')));
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');

});

Auth::routes();

