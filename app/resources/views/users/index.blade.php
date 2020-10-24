
@extends('layouts.app')
@section('title')
<h1 class="font-weight-bold">マイページ</h1>
<p>デート状況や新着情報を確認することができます。</p>
@endsection
@section('content')

    {{ Auth::user()->name }}
    @if($avg == null)
    あなたの代行評価はありません
    @else
    あなたの代行評価は{{$avg}}です。
    @endif
    <a href="{{ route('mypage.edit') }}">アカウント登録情報変更</a>
@endsection

<style>
#box{
  width: 100%;
  height: 100%;
  background-color:#FFD800;
  overflow: hidden;
}
#title{
  margin-left:20%;
  font-size: 50px;
  font-weight: bold; 
  border-left: 9px solid #04A0BB;
  padding-left: 20px;
  margin-top: 5%;
}
#name{
  font-size: 50px;
  font-weight: bold; 
  text-align: center;
  margin-top: 5%;
}
#message{
  font-size: 30px;
  font-weight: bold; 
  text-align: center;
  margin-top: 5%;
}
#link_box{
  font-size: 25px;
  font-weight: bold; 
  padding-left: 80%;
  margin-top: 5%;
}
#link{
  border-bottom: 2px solid #04A0BB;
  color: #04A0BB;
  text-decoration: none;
}

</style>