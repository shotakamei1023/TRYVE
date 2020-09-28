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

Route::get('/contents', 'ContentsController@index')->name('content.index');
Route::get('/contents/create', 'ContentsController@create')->name('content.create');
Route::post('/contents/create/check', 'ContentsController@check')->name('content.check');
Route::post('/contents/create/store', 'ContentsController@store')->name('content.store');
Route::get('/contents/show', 'ContentsController@show')->name('content.show');
Route::get('/mypage/contents', 'MyContentsController@index')->name('mycontent.index');
Route::get('/mypage/contents/{$id}/edit', 'MyContentsController@edit')->name('mycontent.edit');
Route::patch('/mypage/contents/{$id}/update', 'MyContentsController@update')->name('mycontent.update');
Route::delete('/mypage/contents/{$id}/destroy', 'MyContentsController@destroy')->name('mycontent.destroymy');
Route::get('/mypage/tasks', 'MyTasksController@index')->name('mytask.index');
Route::get('/mypage/tasks{$id}/', 'MyTasksController@load')->name('mytask.load');
Route::post('/mypage/tasks{$id}/', 'MyTasksController@post')->name('mytask.post');
Route::get('/mypage/tasks/{$id}/revue', 'MyTasksController@show')->name('mytask.show');
Route::post('/mypage/tasks/{$id}/revue', 'MyTasksController@store')->name('mytask.store');
Route::get('/mypage/tasks{$id}/', 'MyTasksController@edit')->name('mytask.edit');
Route::post('/mypage/tasks/{$id}/revue/', 'MyTasksController@submit')->name('mytask.submit');
Route::delete('/mypage/tasks/{$id}/destroy', 'MyTasksController@destroy')->name('mytask.destroy');