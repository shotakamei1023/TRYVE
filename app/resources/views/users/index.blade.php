
@extends('layouts.app')
@section('top')
<div id="box">
  <div id="title">
    マイページ
  </div>
  <div id="name">
    {{ Auth::user()->name }}
  </div>
  <div id="message">
    あなたのデート代行評価は3.0です。
  </div>
  <div id="link_box">
    <a href="{{ route('user.edit') }}" id="link">アカウント登録情報変更</a>
  </div>
</div>
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