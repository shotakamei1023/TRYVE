<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContentRequest;



class ContentsController extends Controller
{
    // getでcontent/にアクセスされた場合
    public function index(Request $request)
    {
        $items = Content::all();
        $param = ['items' => $items, 'title' => '' , 'prefectures' => '' , 'price' => '' ];
        return view('content.index',$param);
    }

    public function find(Request $request)
    {
            //全部入力されていない時
            if ( empty ( $request['title']) && empty ( $request['prefectures']) && empty ( $request['price'])){
                        $items = Content::all();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('content.index',$param);}

            //titleだけが入力された時
            if ( !empty ( $request['title']) && empty ( $request['prefectures']) && empty ( $request['price'])){
                        $items = Content::where('title','like','%'.$request['title'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('content.index',$param);}
            //prefecturesだけが入力された時
            if ( empty ( $request['title']) && !empty ( $request['prefectures']) && empty ( $request['price'])){
                        $items = Content::where('prefectures','like','%'.$request['prefectures'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('content.index',$param);}

            //priceだけが入力された時
            if ( empty ( $request['title']) && empty ( $request['prefectures']) && !empty ( $request['price'])){
                        $items = Content::where('price','like','%'.$request['price'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('content.index',$param);}
                        
            //titleとpriceが入力された時
            if ( !empty ( $request['title']) && empty ( $request['prefectures']) && !empty ( $request['price'])){
                        $items = Content::where('title','like','%'.$request['title'].'%')
                            ->where('price','like','%'.$request['price'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('content.index',$param);}

            //titleとprefecturesが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['prefectures']) && empty ( $request['price'])){
                        $items = Content::where('title','like','%'.$request['title'].'%')
                            ->where('prefectures','like','%'.$request['prefectures'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                        return view('content.index',$param);}

            //prefecturesとpriceが入力された時
            if ( empty ( $request['title']) && !empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $items = Content::where('prefectures','like','%'.$request['prefectures'].'%')
                            ->where('price','like','%'.$request['price'].'%')->get();
                    $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('content.index',$param);}

            //titleとprefecturesとpriceが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $items = Content::where('title','like','%'.$request['title'].'%')
                            ->where('prefectures','like','%'.$request['prefectures'].'%')
                            ->where('price','like','%'.$request['price'].'%')->get();
                    $param = ['items' => $items,'title' => $request->title,'prefectures' => $request->prefectures,'price' => $request->price];
                    return view('content.index',$param);}
        
    }
    // getでcontent/createにアクセスされた場合
    public function create(Request $request)
    {
        return view('content.create');
    }

    // postでcontent/checkにアクセスされた場合
    public function check(Request $request)
    {
        $inputs = $request->all();

        return view('content.check', ['inputs' => $inputs,]);
    }

    // postでcontent/にアクセスされた場合
    public function store(ContentRequest $request)
    {

        //requestからactionを抽出する。actionが無ければbackを返す
        $action = $request->input('action', 'back');

        //入力画面に返す情報からactionは取り除く。
        $inputs = $request->except('action');

        
         if($action === 'submit') {

            $this->validate($request,Content::$rules);
            $content = new Content;
            $user = Auth::user();
            $form = $request->all();
            unset($form['_token']);
            $content->fill($form);
            $content->owner_id = $user->id;
            $content->save();
            return redirect('/content');
            }else {
            //戻る
            return redirect()->action('ContentsController@create')->withInput($inputs);
    }
    }

    // getでcontent/messageにアクセスされた場合
    public function show()
    {
        return view('content.show');
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

    // openでcontent/messageにアクセスされた場合
    public function open($message)
    {
        
    }

}