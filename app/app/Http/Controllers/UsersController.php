<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('users.index');
    }

    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {   
        $user = Auth::user();
        $user_data = User::find($user->id);
        $user_data->update(['name'=>$request->name,'email'=>$request->email,'password'=>$request->password]);
        return redirect()->action('UsersController@index');
    }
}