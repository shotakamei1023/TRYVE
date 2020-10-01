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
        $contents = Content::where('owner_id', $user->id)->get();
        return view('mycontents.index',compact('contents'));
    }
    // getで/mypage/contents/{$id}/editにアクセスされた場合
    public function edit(Request $request)
    {
        $content = Content::find($request->id);
        return view('mycontents.edit',compact('content'));
    }

    // putで/mypage/contents/{$id}/updateにアクセスされた場合
    public function update(Request $request)
    {
        $content = Content::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $content->fill($form)->save();
        return redirect()->action('MyContentsController@index');
    }

    // deleteで/mypage/contents/{$id}/destroyにアクセスされた場合
    public function destroy(Request $request)
    {
        $content = Content::find($request->id)->delete();
        return redirect()->action('MyContentsController@index');
    }
}