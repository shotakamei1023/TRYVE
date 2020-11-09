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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();
Route::get('/mypage', 'MypageController@index')->name('mypage.index');
Route::get('/mypage/edit', 'MypageController@edit')->name('mypage.edit');
Route::patch('/mypage/update', 'MypageController@update')->name('mypage.update');


Route::get('/contents', 'ContentsController@index')->name('contents.index');
Route::post('/contents/find', 'ContentsController@find')->name('contents.find');
Route::get('/contents/{id}/show', 'ContentsController@show')->name('contents.show');
Route::patch('/contents/{id}/post/', 'ContentsController@post')->name('contents.store')->middleware('auth');

Route::get('/mypage/contents', 'MypageContentsController@index')->name('mypage.contents.index');
Route::post('/mypage/contents/find', 'MypageContentsController@find')->name('mypage.contents.find');
Route::get('/contents/create', 'MypageContentsController@create')->name('mypage.contents.create');
Route::post('/contents/create/check', 'MypageContentsController@check')->name('mypage.contents.create.check');
Route::post('/contents/create/store', 'MypageContentsController@store')->name('mypage.contents.create.store');
Route::get('/mypage/contents/{id}/edit', 'MypageContentsController@edit')->name('mypage.contents.edit');
Route::patch('/mypage/contents/{id}/update', 'MypageContentsController@update')->name('mypage.contents.update');
Route::delete('/mypage/contents/{id}/destroy', 'MypageContentsController@destroy')->name('mypage.contents.destroy');
Route::get('/mypage/contents/{id}/review/show', 'MypageContentsController@show')->name('mypage.contents.review.show');
Route::get('/mypage/contents/{id}/review', 'MypageContentsController@review')->name('mypage.contents.review.index');
Route::patch('/mypage/contents/{id}/review/put', 'MypageContentsController@put')->name('mypage.contents.review.put');
Route::get('/mypage/contents/{id}/helper', 'MypageContentsController@load')->name('mypage.contents.helper');

Route::get('/mypage/tasks', 'MypageTasksController@index')->name('mypage.tasks.index');
Route::post('/mypage/tasks/find', 'MypageTasksController@find')->name('mypage.tasks.find');
Route::get('/mypage/tasks/{id}/', 'MypageTasksController@edit')->name('mypage.tasks.edit');
Route::patch('/mypage/tasks/{id}/review/', 'MypageTasksController@update')->name('mypage.tasks.update');
Route::delete('/mypage/tasks/{id}/destroy', 'MypageTasksController@destroy')->name('mypage.tasks.destroy');
Route::get('/mypage/tasks/{id}/show', 'MypageTasksController@show')->name('mypage.tasks.show');