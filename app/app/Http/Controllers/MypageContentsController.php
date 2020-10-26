<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\ContentItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContentRequest;


class MypageContentsController extends Controller
{

//ユーザー認証
public function __construct()
{
    $this->middleware('auth');
}

    //get マイデート一覧
    public function index()
    {
        $user = Auth::user();
        $contents = Content::where('owner_id', $user->id)->latest()->paginate(5);
        $param = ['contents' => $contents, 'content_status' => '' ];
        return view('mypage.contents.index',$param);
    }

    //post マイデート検索
    public function find(Request $request)
    {
        $user = Auth::user();
        $contents = Content::where('owner_id', $user->id)->where('content_status',$request['content_status'])->paginate(5);
        return view('mypage.contents.index',compact('contents'));
    }

    //get マイデート作成画面
    public function create(Request $request)
    {
        return view('mypage.contents.create');
    }

    //post マイデート作成確認画面
    public function check(ContentRequest $request)
    {
        $validated = $request->validated();
        $inputs = $request->all();
        return view('mypage.contents.check', ['inputs' => $inputs,])->with($validated);
    }

    //post　マイデート作成
    public function store(Request $request)
    {

        //requestからactionを抽出する。actionが無ければbackを返す
        $action = $request->input('action', '入力画面に戻る');

        //入力画面に返す情報からactionは取り除く。
        $inputs = $request->except('action');

         if($action === '作成する') {

            $content = new Content;
            $user = Auth::user();
            $form = $request->all();
            unset($form['_token']);
            $content->fill($form);
            $content->owner_id = $user->id;
            $content->save();
            return redirect()->action('ContentsController@index')->with('msg_success', '依頼作成が完了しました');
            }else {
            //戻る
            return redirect()->action('MypageContentsController@create')->withInput($inputs);
    }
}
    
    //get　マイデート編集画面
    public function edit(Request $request)
    {
        $content = Content::find($request->id);
        return view('mypage.contents.edit',compact('content'));
    }

    //post　マイデート編集
    public function update(Request $request)
    {

        //デート内容の編集
         if($request->type == 'content') {
                $content = Content::find($request->id);
                $form = $request->all();
                unset($form['_token']);
                $content->fill($form)->save();
                return redirect()->action('MypageContentsController@index');
            }
        //代行者確定
        elseif($request->type == 'helper') {
                $contentitem =ContentItem::find($request->id);
                $content = Content::find($contentitem->content_id);
                $content->update(['content_status'=>3,'report_status'=>3,'helper_id'=>$contentitem->user_id]);
                return redirect()->action('MypageContentsController@index');
            }
        
    }

    //delete　マイデート削除
    public function destroy(Request $request)
    {
        $content = Content::find($request->id)->delete();
        return redirect()->action('MypageContentsController@index');
    }

    //get　マイデートのレポート評価画面
    public function review(Request $request)
    {
        $content = Content::find($request->id);
        return view('mypage.contents.review.index',compact('content'));
    }

    //post　マイデートのレポート評価
    public function put(Request $request)
    {
        //requestからactionを抽出する。actionが無ければ戻るを返す
        $action = $request->input('action', '戻る');

        //入力画面に返す情報からactionは取り除く。
        $inputs = $request->except('action');

        
         if($action === 'レポートの評価をする') {
            $content = Content::find($request->id);
            $content->update(['value'=>$request->value]);
            return redirect()->action('MypageContentsController@index')->with('msg_success', '代行の評価が完了しました');
            }else {
            //戻る
            return redirect()->action('MypageContentsController@index');
            }
        
    }

    //get　マイデート詳細
    public function show(Request $request)
    {
        $content = Content::find($request->id);
        return view('mypage.contents.review.show',compact('content'));
    }

    //get　マイデート代行依頼者一覧
    public function load(Request $request)
    {
        $contentitems = ContentItem::where('content_id', $request->id)->whereNull('deleted_at')->get();
        return view('mypage.contents.load',compact('contentitems'));    
    }
    
}