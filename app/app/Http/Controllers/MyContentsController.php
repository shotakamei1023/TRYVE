<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;

class MyContentsController extends Controller
{
    // getで/mypage/contentsにアクセスされた場合
    public function index()
    {
        $user = Auth::user();
        $items = Content::where('owner_id', $user->id)->get();
        $param = ['items' => $items];
        return view('mycontents.index',$param);
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
    public function destroy()
    {
    }
}