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
        $user = Auth::user();
        $contentitems = ContentItem::where('user_id', $user->id)->latest()->paginate(5);
        $param = ['contentitems' => $contentitems, 'report_status' => ''];
        return view('mytasks.index',$param);
    }
        public function find(Request $request)
    {
        $user = Auth::user();
        $contentitems = ContentItem::where('user_id', $user->id)->whereHas('content', function($query)use($request){$query->where('report_status', $request['report_status']);})->paginate(5);
        return view('mytasks.index',compact('contentitems'));
    }
    // getで/mypage/tasks{$id}/にアクセスされた場合
    public function edit(Request $request)
    {
        $content = Content::find($request->id);
        return view('mytasks.edit',compact('content'));
    }
    // postで/mypage/tasks/{$id}/revueにアクセスされた場合
    public function submit(Request $request)
    {
        //requestからactionを抽出する。actionが無ければbackを返す
        $action = $request->input('action', '戻る');

        //入力画面に返す情報からactionは取り除く。
        $inputs = $request->except('action');

        
         if($action === 'レポートを提出する') {

            $content = Content::find($request->id);
            $content->update(['content_status'=>4,'report_status'=>4,'report'=>$request->report]);
            return redirect()->action('MyTasksController@index')->with('msg_success', '依頼作成が完了しました');
            }else {
            //戻る
            return redirect()->action('MyTasksController@index');
            }
    }
    // deleteで/mypage/tasks/{$id}/destroyにアクセスされた場合
    public function destroy(Request $request)
    {
        $contentitem = ContentItem::find($request->id)->delete();
        return redirect()->action('MyTasksController@index');
    }
    public function cancel(Request $request)
    {
        $content = Content::find($request->id);
        $content->update(['content_status'=>2,'report_status'=>2,'helper_id'=>null]);
        return redirect()->action('MyTasksController@index');
    }
    public function show(Request $request)
    {
        $content = Content::find($request->id);
        return view('mytasks.show',compact('content'));
    }
}