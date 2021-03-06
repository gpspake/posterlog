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

get('json', 'JsonController@index');

// Admin area
get('admin', function () {
    return redirect('/admin/poster');
});
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function () {
    resource('admin/poster', 'PosterController', ['except' => 'show']);
    resource('admin/tag', 'TagController', ['except' => 'show']);
    get('admin/upload', 'UploadController@index');
    post('admin/upload/file', 'UploadController@uploadFile');
    delete('admin/upload/file', 'UploadController@deleteFile');
    post('admin/upload/folder', 'UploadController@createFolder');
    delete('admin/upload/folder', 'UploadController@deleteFolder');

});

// Logging in and out
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');

$server = League\Glide\ServerFactory::create([
    'source' => 'public/uploads',
    'cache' => 'storage/framework/cache',
]);

get('images/{path}', function(League\Glide\Server $server, $path){
//dd($server);

    $server->outputImage($path,$_GET);
});