<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class ContentsController extends Controller
{
    // getでcontent/にアクセスされた場合
    public function index(Request $request)
    {
        $items = Content::all();
        return view('content.index',['items' => $items]);
    }

    // getでhello/contentにアクセスされた場合
    public function create()
    {
        
    }

    // postでcontent/にアクセスされた場合
    public function store()
    {
        
    }

    // getでcontent/messageにアクセスされた場合
    public function show($message)
    {
        
    }

    // getでcontent/message/editにアクセスされた場合
    public function edit($message)
    {
        
    }

    // putまたはpatchでcontent/messageにアクセスされた場合
    public function update($message)
    {
        
    }

    // deleteでcontent/messageにアクセスされた場合
    public function destroy($message)
    {
        
    }

    // checkでcontent/messageにアクセスされた場合
    public function check($message)
    {
        
    }

    // openでcontent/messageにアクセスされた場合
    public function open($message)
    {
        
    }

}