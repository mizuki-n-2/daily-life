<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::resource('/todo', 'TodoController')->middleware('auth');
Route::resource('/memo', 'MemoController')->middleware('auth');
Route::post('/memo/search', 'SearchController@memo')->middleware('auth');
Route::resource('/diary', 'DiaryController')->middleware('auth');
Route::post('/diary/search', 'SearchController@diary')->middleware('auth');

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');