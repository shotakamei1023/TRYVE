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
Route::resource('content', 'ContentsController');
//検索ボタンを押すとコントローラのindexメソッドを実行します
Route::post('content','ContentsController@find');
Route::post('/content/check', 'ContentsController@check');
Route::get('/content/open', 'ContentsController@open');

Route::resource('contentitem', 'ContentItemsController');
Route::post('/contentitem/add', 'ContentItemsController@add');
Route::post('/contentitem/insert', 'ContentItemsController@insert');