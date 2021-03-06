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


use App\Topic;
use App\Subtopic;

Route::get('/', 'RootController@root');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/topic', 'TopicsController');
Route::resource('/topic.subtopic', 'SubtopicsController');
Route::resource('/topic.subtopic.message', 'MessagesController');