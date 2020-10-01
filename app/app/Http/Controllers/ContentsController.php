<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContentRequest;
use App\ContentItem;



class ContentsController extends Controller
{
    // getでcontents/にアクセスされた場合
    public function index(Request $request)
    {
        $items = Content::all();
        $param = ['items' => $items, 'title' => '' , 'prefectures' => '' , 'price' => '' ];
        return view('contents.index',$param);
    }

    public function find(Request $request)
    {
            //全部入力されていない時
            if ( empty ( $request['title']) && empty ( $request['prefectures']) && empty ( $request['price'])){
                        $items = Content::all();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('contents.index',$param);}

            //titleだけが入力された時
            if ( !empty ( $request['title']) && empty ( $request['prefectures']) && empty ( $request['price'])){
                        $items = Content::where('title','like','%'.$request['title'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('contents.index',$param);}
            //prefecturesだけが入力された時
            if ( empty ( $request['title']) && !empty ( $request['prefectures']) && empty ( $request['price'])){
                        $items = Content::where('prefectures','like','%'.$request['prefectures'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('contents.index',$param);}

            //priceだけが入力された時
            if ( empty ( $request['title']) && empty ( $request['prefectures']) && !empty ( $request['price'])){
                        $items = Content::where('price','like','%'.$request['price'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('contents.index',$param);}
                        
            //titleとpriceが入力された時
            if ( !empty ( $request['title']) && empty ( $request['prefectures']) && !empty ( $request['price'])){
                        $items = Content::where('title','like','%'.$request['title'].'%')
                            ->where('price','like','%'.$request['price'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('contents.index',$param);}

            //titleとprefecturesが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['prefectures']) && empty ( $request['price'])){
                        $items = Content::where('title','like','%'.$request['title'].'%')
                            ->where('prefectures','like','%'.$request['prefectures'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('contents.index',$param);}

            //prefecturesとpriceが入力された時
            if ( empty ( $request['title']) && !empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $items = Content::where('prefectures','like','%'.$request['prefectures'].'%')
                            ->where('price','like','%'.$request['price'].'%')->get();
                    $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('contents.index',$param);}

            //titleとprefecturesとpriceが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $items = Content::where('title','like','%'.$request['title'].'%')
                            ->where('prefectures','like','%'.$request['prefectures'].'%')
                            ->where('price','like','%'.$request['price'].'%')->get();
                    $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
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
        $action = $request->input('action', 'back');

        //入力画面に返す情報からactionは取り除く。
        $inputs = $request->except('action');

        
         if($action === 'submit') {

            $content = new Content;
            $user = Auth::user();
            $form = $request->all();
            unset($form['_token']);
            $content->fill($form);
            $content->owner_id = $user->id;
            $content->save();
            return redirect('/contents');
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
        if($content->owner_id == $user->id){
             return redirect()->action('ContentsController@index')->with('flash_message', '自分が作成した依頼に申請することはできません。');
        }
        else
        $content->update(['content_status'=>2,'report_status'=>2]);
        $contentitem = new ContentItem;
        $contentitem->fill(['user_id' => $user->id,'content_id' => $request->id])->save();
    }
}