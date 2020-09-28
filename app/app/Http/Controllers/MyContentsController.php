<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyContentsController extends Controller
{
    // getで/mypage/contentsにアクセスされた場合
    public function index()
    {
        return view('mycontents.index');
    }
    // getで/mypage/contents/{$id}/editにアクセスされた場合
    public function edit()
    {
    }

    // putで/mypage/contents/{$id}/updateにアクセスされた場合
    public function updata()
    {
    }

    // deleteで/mypage/contents/{$id}/destroyにアクセスされた場合
    public function update()
    {
    }
}