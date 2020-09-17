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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('content', 'App\Controllers\ContentsController');
Route::post('/content/check', 'UserController@check');
Route::get('/content/open', 'UserController@open');

Route::resource('contentitem', 'App\Controllers\ContentsController');
Route::post('/contentitem/add', 'UserController@add');
Route::post('/contentitem/insert', 'UserController@insert');