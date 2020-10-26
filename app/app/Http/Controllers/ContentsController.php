<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\Auth;
use App\ContentItem;
use DB;

class ContentsController extends Controller
{

    //get　デート一覧
    public function index(Request $request)
    {
        $contents = Content::whereNull('helper_id')->latest()->paginate(5);
        $param = ['contents' => $contents, 'title' => '' , 'prefectures' => '' , 'price' => '' ];
        return view('contents.index',$param);
    }

    //post　デート検索
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

    //get　デート詳細
    public function show(Request $request)
    {
        $content = Content::find($request->id);
        return view('contents.show',compact('content'));
    }

    //post　代行申請(会員コンテンツ)
    public function post(Request $request)
    {
        $content = Content::find($request->id);
        $user = Auth::user();
        $contentitem_query = ContentItem::where('user_id',$user->id)->where('content_id',$content->id)->get();
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