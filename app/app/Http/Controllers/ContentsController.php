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
    public function index()
    {
        $contents = Content::whereNull('helper_id')->latest()->paginate(6);
        return view('contents.index')->with([
                'contents' => $contents,
                'title' => '',
                'prefectures' => '',
                'price' => '',
                ]);
    }

    //post　デート検索
    public function find(Request $request)
    {
            //全部入力されていない時
            if ( empty ( $request['title']) && empty ( $request['prefectures']) && empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->latest()->paginate(6);
                    return view('contents.index')->with([
                        'contents' => $contents,
                        'title' => $request->title,
                        'prefectures' => $request->prefectures,
                        'price' => $request->price,
                        ]);
                }

            //titleだけが入力された時
            if ( !empty ( $request['title']) && empty ( $request['prefectures']) && empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->where('title','like','%'.$request['title'].'%')->latest()->paginate(6);
                    return view('contents.index')->with([
                        'contents' => $contents,
                        'title' => $request->title,
                        'prefectures' => $request->prefectures,
                        'price' => $request->price,
                        ]);
                }
                
            //prefecturesだけが入力された時
            if ( empty ( $request['title']) && !empty ( $request['prefectures']) && empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->where('prefectures','like','%'.$request['prefectures'].'%')->latest()->paginate(6);
                    return view('contents.index')->with([
                        'contents' => $contents,
                        'title' => $request->title,
                        'prefectures' => $request->prefectures,
                        'price' => $request->price,
                        ]);
                }

            //priceだけが入力された時
            if ( empty ( $request['title']) && empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->where('price','like','%'.$request['price'].'%')->latest()->paginate(6);
                    return view('contents.index')->with([
                        'contents' => $contents,
                        'title' => $request->title,
                        'prefectures' => $request->prefectures,
                        'price' => $request->price,
                        ]);
                }
                        
            //titleとpriceが入力された時
            if ( !empty ( $request['title']) && empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->where('title','like','%'.$request['title'].'%')->where('price','like','%'.$request['price'].'%')->latest()->paginate(6);
                    return view('contents.index')->with([
                        'contents' => $contents,
                        'title' => $request->title,
                        'prefectures' => $request->prefectures,
                        'price' => $request->price,
                        ]);
                }

            //titleとprefecturesが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['prefectures']) && empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->where('title','like','%'.$request['title'].'%')->where('prefectures','like','%'.$request['prefectures'].'%')->latest()->paginate(6);
                    return view('contents.index')->with([
                        'contents' => $contents,
                        'title' => $request->title,
                        'prefectures' => $request->prefectures,
                        'price' => $request->price,
                        ]);
                    }

            //prefecturesとpriceが入力された時
            if ( empty ( $request['title']) && !empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->where('prefectures','like','%'.$request['prefectures'].'%')->where('price','like','%'.$request['price'].'%')->latest()->paginate(6);
                    return view('contents.index')->with([
                        'contents' => $contents,
                        'title' => $request->title,
                        'prefectures' => $request->prefectures,
                        'price' => $request->price,
                        ]);
                    }

            //titleとprefecturesとpriceが入力された時
            if ( !empty ( $request['title']) && !empty ( $request['prefectures']) && !empty ( $request['price'])){
                    $contents = Content::whereNull('helper_id')->where('title','like','%'.$request['title'].'%')->where('prefectures','like','%'.$request['prefectures'].'%')->where('price','like','%'.$request['price'].'%')->latest()->paginate(6);
                    return view('contents.index')->with([
                        'contents' => $contents,
                        'title' => $request->title,
                        'prefectures' => $request->prefectures,
                        'price' => $request->price,
                        ]);
                    }
    }    

    //get　デート詳細
    public function show($id)
    {
        $content = Content::find($id);
        return view('contents.show',compact('content'));
    }

    //post　代行申請(会員コンテンツ)
    public function post($id)
    {
        $content = Content::find($id);
        $contentitem_query = ContentItem::where('user_id',Auth::user()->id)->where('content_id',$content->id)->get();

        if($content->owner_id == Auth::user()->id){
            return redirect()->action('ContentsController@index')->with('error_message', '自分が作成した依頼に申請することはできません。');
        }
        elseif(isset($contentitem_query[0])){
            return redirect()->action('ContentsController@index')->with('error_message', '代行申請は一つの依頼に一度しかできません。');
        }
        else
            $content->update(['content_status'=>2,'report_status'=>2]);
            ContentItem::create(['user_id' => Auth::user()->id,'content_id' => $id]);
            return redirect()->action('ContentsController@index')->with('msg_success', '代行申請が完了しました');
    }
}