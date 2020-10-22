@extends('layouts.app')

@section('content')
<h2>依頼作成画面</h2>
@if($errors->any())
<div>
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form action="/contents/create/check" method="post">
@csrf
<tr>
<th><input type="text" name="title" value="{{old('title')}}" placeholder="タイトル"></th>
<th><input type="text" id="placename"　name="placename" value="{{old('placename')}}" placeholder="地名入力"></th>
<input type="button" value="地図URL取得" onClick="codeAddress()">
<th><input type="number" name="price" value="{{old('price')}}" placeholder="報酬"></th>
<th><input type="text" name="order" value="{{old('order')}}" placeholder="依頼内容"></th>
<th><input id="prefectures" type="text" name="prefectures" value="{{old('prefectures')}}" placeholder="都道府県が自動入力されます"></th>
<th><input id="address"　type="text" name="address" value="{{old('address')}}" placeholder="都道府県以下が自動入力されます"></th>
<input id="addressURL" type="hidden" name="gmap" value="{{old('gmap')}}" >
<th><input type="submit" value="送信"></th>
</tr>

<div id="latlngDisplay">{{-- ここに緯度、経緯が表示される --}}</div>
<div id="map"></div>

<style>
#map{
  height: 600px;
  width: 600px;
}
#latlngDisplay{
  display:none;
}
</style>

<script src="{{ asset('/assets/js/googlemap_api.js') }}"></script>
<script src="{{ asset('/assets/js/apikey.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApeoUq6ta-vcz7YtJRf7wiDcUPLr5g5Yw&callback=initMap" async
  defer></script>
@endsection
