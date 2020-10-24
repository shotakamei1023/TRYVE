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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();
Route::get('/mypage', 'UsersController@index')->name('mypage.index');
Route::get('/mypage/edit', 'UsersController@edit')->name('mypage.edit');
Route::patch('/mypage/update', 'UsersController@update')->name('mypage.update');


Route::get('/contents', 'ContentsController@index')->name('contents.index');
Route::post('/contents/find', 'ContentsController@find')->name('contents.find');
Route::get('/contents/create', 'ContentsController@create')->name('mypage.contents.create');
Route::post('/contents/create/check', 'ContentsController@check')->name('mypage.contents.create.check');
Route::post('/contents/create/store', 'ContentsController@store')->name('mypage.contents.create.store');
Route::get('/contents/{id}/show', 'ContentsController@show')->name('contents.show');
Route::patch('/contents/{id}/post/', 'ContentsController@post')->name('contents.store');
Route::get('/mypage/contents', 'MyContentsController@index')->name('mypage.contents.index');
Route::post('/mypage/contents/find', 'MyContentsController@find')->name('mypage.contents.find');
Route::get('/mypage/contents/{id}/edit', 'MyContentsController@edit')->name('mypage.contents.edit');
Route::patch('/mypage/contents/{id}/update', 'MyContentsController@update')->name('mypage.contents.update');
Route::delete('/mypage/contents/{id}/destroy', 'MyContentsController@destroy')->name('mypage.contents.destroy');
Route::get('/mypage/contents/{id}/revue', 'MyContentsController@revue')->name('mypage.contents.revue.index');
Route::patch('/mypage/contents/{id}/revue/store', 'MyContentsController@store')->name('mypage.contents.revue.store');
Route::get('/mypage/contents/{id}/revue/show', 'MyContentsController@show')->name('mypage.contents.revue.show');
Route::get('/mypage/contents/{id}/helper', 'MyContentsController@load')->name('mypage.contents.helper');
Route::patch('/mypage/contents/{id}/helper/permit', 'MyContentsController@permit')->name('mypage.contents.update');
Route::get('/mypage/tasks', 'MyTasksController@index')->name('mypage.tasks.index');
Route::post('/mypage/tasks/find', 'MyTasksController@find')->name('mypage.tasks.find');
Route::get('/mypage/tasks{id}/', 'MyTasksController@edit')->name('mypage.tasks.edit');
Route::patch('/mypage/tasks/{id}/revue/', 'MyTasksController@submit')->name('mypage.tasks.update');
Route::delete('/mypage/tasks/{id}/destroy', 'MyTasksController@destroy')->name('mypage.tasks.destroy');
Route::patch('/mypage/tasks/{id}/cancel', 'MyTasksController@cancel')->name('mypage.tasks.update');
Route::get('/mypage/tasks/{id}/show', 'MyTasksController@show')->name('mypage.tasks.show');