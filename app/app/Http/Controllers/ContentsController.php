<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;


class ContentsController extends Controller
{
    // getでcontent/にアクセスされた場合
    public function index(Request $request)
    {
        $items = Content::all();
        $param = ['items' => $items, 'title' => '' , 'address_first' => '' , 'price' => '' ];
        return view('content.index',$param);
    }

    public function find(Request $request)
    {
            //全部入力されていない時
            if ( empty ( $request['title']) && empty ( $request['address_first']) && empty ( $request['price'])){
                        $items = Content::all();
                        $param = ['items' => $items,'title' => $request->title,'address_first' => $request->address_first,'price' => $request->price];
                    return view('content.index',$param);}

            //titleだけが入力された時
            if ( !empty ( $request['title']) && empty ( $request['address_first']) && empty ( $request['price'])){
                        $items = Content::where('title','like','%'.$request['title'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'address_first' => $request->address_first,'price' => $request->price];
                    return view('content.index',$param);}
            //address_firstだけが入力された時
            if ( empty ( $request['title']) && !empty ( $request['address_first']) && empty ( $request['price'])){
                        $items = Content::where('address_first','like','%'.$request['address_first'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'address_first' => $request->address_first,'price' => $request->price];
                        return view('content.index',$param);}

            //priceだけが入力された時
            if ( empty ( $request['title']) && empty ( $request['address_first']) && !empty ( $request['price'])){
                        $items = Content::where('price','like','%'.$request['price'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'address_first' => $request->address_first,'price' => $request->price];
                        return view('content.index',$param);}
                        
            //titleとpriceが入力された時
            if ( !empty ( $request['title']) && empty ( $request['address_first']) && !empty ( $request['price'])){
                        $items = Content::where('title','like','%'.$request['title'].'%')
                            ->where('price','like','%'.$request['price'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'address_first' => $request->address_first,'price' => $request->price];
                        return view('content.index',$param);}

            //titleとaddress_firstが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['address_first']) && empty ( $request['price'])){
                        $items = Content::where('title','like','%'.$request['title'].'%')
                            ->where('address_first','like','%'.$request['address_first'].'%')->get();
                        $param = ['items' => $items,'title' => $request->title,'address_first' => $request->address_first,'price' => $request->price];
                        return view('content.index',$param);}

            //address_firstとpriceが入力された時
            if ( empty ( $request['title']) && !empty ( $request['address_first']) && !empty ( $request['price'])){
                    $items = Content::where('address_first','like','%'.$request['address_first'].'%')
                            ->where('price','like','%'.$request['price'].'%')->get();
                    $param = ['items' => $items,'title' => $request->title,'address_first' => $request->address_first,'price' => $request->price];
                    return view('content.index',$param);}

            //titleとaddress_firstとpriceが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['address_first']) && !empty ( $request['price'])){
                    $items = Content::where('title','like','%'.$request['title'].'%')
                            ->where('address_first','like','%'.$request['address_first'].'%')
                            ->where('price','like','%'.$request['price'].'%')->get();
                    $param = ['items' => $items,'title' => $request->title,'address_first' => $request->address_first,'price' => $request->price];
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
    public function store(Request $request)
    {

        //requestからactionを抽出する。actionが無ければbackを返す
        $action = $request->input('action', 'back');

        //入力画面に返す情報からactionは取り除く。
        $inputs = $request->except('action');

        
         if($action === 'submit') {

            //  保存処理書く、owner_idに自分のid入れる

        return view('content.index');
        } else {
        //戻る
        return redirect()->action('ContentsController@create')->withInput($inputs);
    }
    }

    // getでcontent/messageにアクセスされた場合
    public function show($message)
    {
        
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