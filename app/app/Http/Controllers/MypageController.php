<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ContentItem;
use App\Content;
use App\User;
use Illuminate\Support\Facades\Hash;



class MypageController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $contents_count = Content::where('helper_id', $user->id)->whereNotNull('value')->get();
        $avg = collect($contents_count)->avg('value');
        $contents = Content::where('owner_id', $user->id)->where('content_status', 2)->latest()->limit(3)->get();
        $contentitems = ContentItem::where('user_id', $user->id)->latest()->whereHas('content', function($query)use($request){$query->where('report_status', 3);})->limit(3)->get();
        return view('mypage.index',compact('avg','contents','contentitems'));
    }

    public function edit()
    {
        return view('mypage.edit');
    }

    public function update(Request $request)
    {   
        $user = Auth::user();
        $user_data = User::find($user->id);
        $user_data->update(['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
        return redirect()->action('MypageController@index');
    }
}