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
        $param = ['items' => $items, 'title' => '' , 'address_first' => '' , 'price' => '' ];
        return view('content.index',$param);
    }

    public function find(Request $request)
    {
        if ( isset ( $request['title'] ) ){
        $items = Content::where('title',$request['title'])->get();
        $param = ['items' => $items, 'title' => $request->input];
        return view('content.index',$param);
        }
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