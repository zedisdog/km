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

Route::get('/', function () {
    return redirect(route('topic.show',['id' => 1]));
});

//Route::auth();

Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('/home', 'HomeController@index');

Route::post('/topic/upload-image','TopicController@uploadImage');

Route::get('/topic/ajax-topics','TopicController@ajaxTopics');

Route::post('/topic/search',['as' => 'topic.search','uses' => 'TopicController@search']);

Route::resource('topic', 'TopicController');
