<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //get　トップページ
    public function index(Request $request)
    {
        $contents = Content::whereNull('helper_id')->latest()->limit(3)->get();
        return view('index',compact('contents'));
    }
}