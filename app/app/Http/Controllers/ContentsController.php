<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContentRequest;
use App\ContentItem;
use DB;




class ContentsController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}

    // getでcontents/にアクセスされた場合
    public function index(Request $request)
    {
        $contents = Content::whereNull('helper_id')->latest()->paginate(5);
        $param = ['contents' => $contents, 'title' => '' , 'prefectures' => '' , 'price' => '' ];
        return view('contents.index',$param);
    }

    public function find(Request $request)
    {
            //全部入力されていない時
            if ( empty ( $request['title']) && empty ( $request['prefectures']) && empty ( $request['price'])){
                        $contents = Content::whereNull('helper_id')->paginate(5);
                        $param = ['contents' => $contents,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('contents.index',$param);}

            //titleだけが入力された時
            if ( !empty ( $request['title']) && empty ( $request['prefectures']) && empty ( $request['price'])){
                        $contents = Content::whereNull('helper_id')->where('title','like','%'.$request['title'].'%')->paginate(5);
                        $param = ['contents' => $contents,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('contents.index',$param);}
            //prefecturesだけが入力された時
            if ( empty ( $request['title']) && !empty ( $request['prefectures']) && empty ( $request['price'])){
                        $contents = Content::whereNull('helper_id')->where('prefectures','like','%'.$request['prefectures'].'%')->paginate(5);
                        $param = ['contents' => $contents,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('contents.index',$param);}

            //priceだけが入力された時
            if ( empty ( $request['title']) && empty ( $request['prefectures']) && !empty ( $request['price'])){
                        $contents = Content::whereNull('helper_id')->where('price','like','%'.$request['price'].'%')->paginate(5);
                        $param = ['contents' => $contents,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('contents.index',$param);}
                        
            //titleとpriceが入力された時
            if ( !empty ( $request['title']) && empty ( $request['prefectures']) && !empty ( $request['price'])){
                        $contents = Content::whereNull('helper_id')->where('title','like','%'.$request['title'].'%')
                            ->where('price','like','%'.$request['price'].'%')->paginate(5);
                        $param = ['contents' => $contents,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('contents.index',$param);}

            //titleとprefecturesが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['prefectures']) && empty ( $request['price'])){
                        $contents = Content::whereNull('helper_id')->where('title','like','%'.$request['title'].'%')
                            ->where('prefectures','like','%'.$request['prefectures'].'%')->paginate(5);
                        $param = ['contents' => $contents,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('contents.index',$param);}

            //prefecturesとpriceが入力された時
            if ( empty ( $request['title']) && !empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->where('prefectures','like','%'.$request['prefectures'].'%')
                            ->where('price','like','%'.$request['price'].'%')->paginate(5);
                    $param = ['contents' => $contents,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('contents.index',$param);}

            //titleとprefecturesとpriceが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->where('title','like','%'.$request['title'].'%')
                            ->where('prefectures','like','%'.$request['prefectures'].'%')
                            ->where('price','like','%'.$request['price'].'%')->paginate(5);
                    $param = ['contents' => $contents,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('contents.index',$param);}
        
    }
    // getでcontent/createにアクセスされた場合
    public function create(Request $request)
    {
        return view('contents.create');
    }

    // postでcontent/create/checkにアクセスされた場合
    public function check(ContentRequest $request)
    {
        $validated = $request->validated();
        $inputs = $request->all();
        return view('contents.check', ['inputs' => $inputs,])->with($validated);
    }

    // postでcontent/create/storeにアクセスされた場合
    public function store(Request $request)
    {

        //requestからactionを抽出する。actionが無ければbackを返す
        $action = $request->input('action', '戻る');

        //入力画面に返す情報からactionは取り除く。
        $inputs = $request->except('action');

        
         if($action === '送信する') {

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
            return redirect()->action('ContentsController@create')->withInput($inputs);
    }
    }

    // getで/contents/show/{$id}/にアクセスされた場合
    public function show(Request $request)
    {
        $content = Content::find($request->id);
        return view('contents.show',compact('content'));
    }

    // postで/contents/post/{$id}/にアクセスされた場合
    public function post(Request $request)
    {
        $content = Content::find($request->id);
        $user = Auth::user();
        $contentitem_query = ContentItem::where('user_id',$user->id)->where('content_id',$content->id)->get();
        // var_dump($contentitem_query);
        if($content->owner_id == $user->id){
            return redirect()->action('ContentsController@index')->with('flash_message', '自分が作成した依頼に申請することはできません。');
        }
        elseif(isset($contentitem_query[0])){
                        return redirect()->action('ContentsController@index')->with('flash_message', '代行申請は一つの依頼に一度しかできません。');
        }
        else
        $content->update(['content_status'=>2,'report_status'=>2]);
        $contentitem = new ContentItem;
        $contentitem->fill(['user_id' => $user->id,'content_id' => $request->id])->save();
            return redirect()->action('ContentsController@index')->with('msg_success', '代行申請が完了しました');
    }
}