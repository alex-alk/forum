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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'RootController@root');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('topics', 'TopicsController');
Route::resource('subtopics', 'SubtopicsController');
Route::resource('messages', 'MessagesController');

Route::get('/topic/{id}/subtopic/create', 'SubtopicsController@create');
Route::get('/topic/{id1}/subtopic/{id2}/message/create', 'MessagesController@create');
Route::get('/topic/{id1}/subtopic/{id2}/message/{id3}/edit', 'MessagesController@edit');


Route::post('/topic/{id}/subtopic', 'SubtopicsController@store');
Route::delete('/topic/{id1}/subtopic/{id2}', 'SubtopicsController@destroy');
Route::post('/topic/{id1}/subtopic/{id2}/message', 'MessagesController@store');
Route::delete('/topic/{id1}/subtopic/{id2}/message/{id3}', 'MessagesController@destroy');
Route::patch('/topic/{id1}/subtopic/{id2}/message/{id3}', 'MessagesController@update');

// route conventions: photos.index, photos.create
// you should use regex for route matching

/** define a route group: */
//Route::middleware('auth')->group(function() {
//    Route::get('dashboard', function () {
//        return view('dashboard');
//    });
//    Route::get('account', function () {
//        return view('account');
//    });
//});

//Often it’s clearer and more direct to attach middleware to your routes in the controller
//instead of at the route definition. You can do this by calling the middleware()
//method in the constructor of your controller. The string you pass to the middle
//ware() method is the name of the middleware, and you can optionally chain modifier
//methods (only() and except()) to define which methods will receive that middleware

/** Throttle middleware: */
//Route::middleware('auth:api', 'throttle:60,1')->group(function () {
//    Route::get('/profile', function () {
////
//    });
//});

/** Path prefixed */
//Route::prefix('dashboard')->group(function () {
//    Route::get('/', function () {
//// Handles the path /dashboard
//    });
//    Route::get('users', function () {
//// Handles the path /dashboard/users
//    });
//});

/** Name prefixed */
//Route::name('admin.')->group(function () {
//    Route::get('/users', function () {
//        // Route assigned name "admin.users"...
//    })->name('users');
//});

/** Subdomain routing */
//Route::domain('api.myapp.com')->group(function () {
//    Route::get('/', function () {
////
//    });
//});

/** Signed routes */
//Route::get('invitations/{invitation}/{answer}', 'InvitationController')
//    ->name('invitations')
//    ->middleware('signed');

// Generate a normal link
//URL::route('invitations', ['invitation' => 12345, 'answer' => 'yes']);

// Generate a signed link
//URL::signedRoute('invitations', ['invitation' => 12345, 'answer' => 'yes']);

// Generate an expiring (temporary) signed link
//URL::temporarySignedRoute(
//    'invitations',
//    now()->addHours(4),
//    ['invitation' => 12345, 'answer' => 'yes']
//);

/** Route shortcut */
// Returns resources/views/welcome.blade.php
//Route::view('/', 'welcome');

/** List routes */
//artisan route:list

/** Generate api controller */
//php artisan make:controller MySampleResourceController --api


//To cache your routes file, you need to be using all controller, redirect, view, and
//resource routes (no route closures). If your app isn’t using any route closures, you can
//run php artisan route:cache and Laravel will serialize the results of your routes/*
//files.

/** Set up csrf in ajax */

//$.ajaxSetup({
//headers: {
//    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//}
//});