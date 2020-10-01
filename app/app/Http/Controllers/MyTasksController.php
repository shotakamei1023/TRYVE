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
    public function load(Request $request)
    {
        $contents = ContentItem::where('content_id', $request->id)->get();
        return view('mytasks.load',compact('contents'));    
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
    // patchで/mypage/tasks/load/{$id}/permitにアクセスされた場合
    public function permit(Request $request)
    {
        $content = Content::find($request->id);
        $contentitem = ContentItem::where('content_id', $request->id)->first();
        $content->update(['content_status'=>3,'report_status'=>3,'helper_id'=>$contentitem->user_id]);
        return redirect()->action('MyContentsController@index');
    }
}