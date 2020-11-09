<?php

namespace App\Http\Controllers;
use App\Content;
use App\ContentItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MypageTasksController extends Controller
{
    //get　デートの予定一覧
    public function index()
    {
        $contentitems = ContentItem::where('user_id', Auth::user()->id)->latest()->paginate(5);
        return view('mypage.tasks.index')->with([
                    'contentitems' => $contentitems,
                    ]);
    }

    //post　デートの予定検索
        public function find(Request $request)
    {
        $contentitems = ContentItem::where('user_id', Auth::user()->id)->whereHas('content', function($query)use($request){$query->where('report_status', $request['report_status']);})->paginate(5);
        return view('mypage.tasks.index',compact('contentitems'));
    }

    //get　レポート提出画面
    public function edit(Request $request)
    {
        $content = Content::find($request->id);
        return view('mypage.tasks.edit',compact('content'));
    }

    public function update(Request $request){
        //レポート提出
        if($request->type == 'report') {
                //requestからactionを抽出する。actionが無ければbackを返す
                $action = $request->input('action', '戻る');

                //入力画面に返す情報からactionは取り除く。
                $inputs = $request->except('action');

                
                if($action === 'レポートを提出する') {

                    $content = Content::find($request->id);
                    $content->update(['content_status'=>4,
                                'report_status'=>4,
                                'report'=>$request->report]);
                    return redirect()->action('MypageTasksController@index')->with('msg_success', 'レポート提出が完了しました');
                    }else{
                    //戻る
                    return redirect()->action('MypageTasksController@index');
                    }
                }
        //代行依頼途中中断
        elseif($request->type == 'cancel') {
                $content = Content::find($request->id);
                $content->update(['content_status'=>2,
                            'report_status'=>2,
                            'helper_id'=>null]);
                return redirect()->action('MypageTasksController@index');
            }
    }

    //delete　代行依頼削除
    public function destroy(Request $request)
    {
        $contentitem = ContentItem::find($request->id)->delete();
        return redirect()->action('MypageTasksController@index');
    }

    //get　デート代行詳細
    public function show(Request $request)
    {
        $content = Content::find($request->id);
        return view('mypage.tasks.show',compact('content'));
    }
}