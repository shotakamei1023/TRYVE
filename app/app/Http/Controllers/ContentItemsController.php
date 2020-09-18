<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ContentItem;


class ContentItemsController extends Controller
{
     // getでcontentitem/にアクセスされた場合
    public function index()
    {
        return view('content.profile', ['user' => User::findOrFail($id)]);
    }

    // getでhello/contentitemにアクセスされた場合
    public function create()
    {
        
    }

    // postでcontentitem/にアクセスされた場合
    public function store()
    {
        
    }

    // getでcontentitem/messageにアクセスされた場合
    public function show($message)
    {
        
    }

    // getでcontentitem/message/editにアクセスされた場合
    public function edit($message)
    {
        
    }

    // putまたはpatchでcontentitem/messageにアクセスされた場合
    public function update($message)
    {
        
    }

    // deleteでcontentitem/messageにアクセスされた場合
    public function destroy($message)
    {
        
    }

    // addでcontentitem/messageにアクセスされた場合
    public function add($message)
    {
        
    }

    // insertでcontentitem/messageにアクセスされた場合
    public function insert($message)
    {
        
    }
}