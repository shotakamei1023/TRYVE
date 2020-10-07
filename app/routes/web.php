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

Route::get('/', 'HomeController@index')->name('home.index');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mypage', 'UsersController@index')->name('user.index');
Route::get('/mypage/edit', 'UsersController@edit')->name('user.edit');
Route::patch('/mypage/update', 'UsersController@update')->name('user.update');


Route::get('/contents', 'ContentsController@index')->name('content.index');
Route::post('/contents/find', 'ContentsController@find')->name('content.find');
Route::get('/contents/create', 'ContentsController@create')->name('content.create');
Route::post('/contents/create/check', 'ContentsController@check')->name('content.check');
Route::post('/contents/create/store', 'ContentsController@store')->name('content.store');
Route::get('/contents/{id}/show', 'ContentsController@show')->name('content.show');
Route::patch('/contents/{id}/post/', 'ContentsController@post')->name('content.post');
Route::get('/mypage/contents', 'MyContentsController@index')->name('mycontent.index');
Route::get('/mypage/contents/{id}/edit', 'MyContentsController@edit')->name('mycontent.edit');
Route::patch('/mypage/contents/{id}/update', 'MyContentsController@update')->name('mycontent.update');
Route::delete('/mypage/contents/{id}/destroy', 'MyContentsController@destroy')->name('mycontent.destroy');
Route::get('/mypage/contents/{id}/revue', 'MyContentsController@revue')->name('mycontent.revue');
Route::patch('/mypage/contents/{id}/revue/store', 'MyContentsController@store')->name('mycontent.store');
Route::get('/mypage/contents/{id}/revue/show', 'MyContentsController@show')->name('mycontent.show');
Route::get('/mypage/contents/{$id}/helper', 'MyTasksController@load')->name('mycontent.load');
Route::patch('/mypage/contents/{$id}/helper/permit', 'MyTasksController@permit')->name('mycontent.permit');
Route::get('/mypage/tasks', 'MyTasksController@index')->name('mytask.index');
Route::get('/mypage/tasks{id}/', 'MyTasksController@edit')->name('mytask.edit');
Route::patch('/mypage/tasks/{id}/revue/', 'MyTasksController@submit')->name('mytask.submit');
Route::delete('/mypage/tasks/{id}/destroy', 'MyTasksController@destroy')->name('mytask.destroy');