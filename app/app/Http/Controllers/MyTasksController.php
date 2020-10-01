<?php

namespace App\Http\Controllers;
use App\Content;
use App\ContentItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyTasksController extends Controller
{
    // getで/mypage/tasksにアクセスされた場合
    public function index()
    {

        }
    // getで/mypage/tasks{$id}/にアクセスされた場合
    public function load()
    {
    }
    // getで/mypage/tasks/{$id}/revueにアクセスされた場合
    public function show()
    {
    }
    // postで/mypage/tasks/{$id}/revueにアクセスされた場合
    public function store()
    {
    }
    // getで/mypage/tasks{$id}/にアクセスされた場合
    public function edit()
    {
    }
    // postで/mypage/tasks/{$id}/revueにアクセスされた場合
    public function submit()
    {
    }
    // deleteで/mypage/tasks/{$id}/destroyにアクセスされた場合
    public function destroy()
    {
    }
}