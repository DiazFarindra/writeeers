<?php

use Illuminate\Support\Facades\Route;


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


// AUTH Handler
Auth::routes(['verify' => true]);

// Google Auth Handler
Route::get('/auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('/auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');



// User Handler
Route::get('/me', 'HomeController@index');
Route::get('/me/{user:name}/edit', 'HomeController@edit');
Route::patch('/me/{user}', 'HomeController@update');



// CRUD Handler
Route::get('/', 'MainController@index');
Route::get('/new-story', 'MainController@create');
Route::get('/{user:name}/{main:title}', 'MainController@show');
Route::post('/story', 'MainController@store');
Route::delete('/story/{main}', 'MainController@destroy');
Route::get('/story/edit/{main:title}', 'MainController@edit');
Route::patch('/story/{main}', 'MainController@update');



// Algolia Search Handler
Route::any('/search', 'SearchController@search');
