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

get('/', function () {
    return redirect('/poster');
});

get('poster', 'PosterController@index');
get('poster/{slug}', 'PosterController@showPoster');

// Admin area
get('admin', function () {
    return redirect('/admin/poster');
});
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function () {
    resource('admin/poster', 'PosterController');
    resource('admin/tag', 'TagController');
    get('admin/upload', 'UploadController@index');
});

// Logging in and out
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');