<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Content;
use App\User;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $contents = Content::where('helper_id', $user->id)->whereNotNull('value')->get();
        $avg = collect($contents)->avg('value');
        return view('users.index',compact('avg'));
    }

    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {   
        $user = Auth::user();
        $user_data = User::find($user->id);
        $user_data->update(['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
        return redirect()->action('UsersController@index');
    }
}