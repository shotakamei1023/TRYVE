<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;

class MyContentsController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}
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
    ///mypage/tasks/{$id}/revueにアクセスされた場合
    public function revue(Request $request)
    {
        $content = Content::find($request->id);
        return view('mycontents.revue',compact('content'));
    }
    ///mypage/tasks/{$id}/revue/storeにアクセスされた場合
    public function store(Request $request)
    {
        $content = Content::find($request->id);
        $content->update(['value'=>$request->value]);
        return redirect()->action('MyContentsController@index');
    }
    ///mypage/tasks/{$id}/revue/showにアクセスされた場合
    public function show(Request $request)
    {
        $content = Content::find($request->id);
        return view('mycontents.show',compact('content'));
    }
    // getで/mypage/contents/{$id}/helperにアクセスされた場合
    public function load(Request $request)
    {
        $contents = ContentItem::where('content_id', $request->id)->get();
        return view('mytasks.load',compact('contents'));    
    }
    // patchで/mypage/contents/{$id}/helper/permitにアクセスされた場合
    public function permit(Request $request)
    {
        $content = Content::find($request->id);
        $contentitem = ContentItem::where('content_id', $request->id)->first();
        $content->update(['content_status'=>3,'report_status'=>3,'helper_id'=>$contentitem->user_id]);
        return redirect()->action('MyContentsController@index');
    }
}