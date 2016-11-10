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

//get main page 
Route::get('main', function()
{
    return View('pages.main');
});

/*
 DON'T FORGET: for use patch, put or delete methods
 You must use post method with hidden variable '_method' with value PATCH, PUT or DELETE
*/

Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::post('signup', 'RegisterController@create');

    Route::resource('album', 'AlbumController', ['except' => ['create', 'edit']]);

    Route::resource('album/{album}/photo', 'PhotoController', ['except' => ['create', 'edit']]);
    Route::get('album/{album}/photo/{id}/like', 'PhotoController@setLike');
    Route::get('album/{album}/photo/{id}/is_liked_by_user', 'PhotoController@isLikedByUser');
    Route::get('album/{album}/photo/{id}/unlike', 'PhotoController@removeLike');

    Route::resource('/photo/{id}/comment', 'CommentController', ['except' => ['create', 'edit']]);
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


