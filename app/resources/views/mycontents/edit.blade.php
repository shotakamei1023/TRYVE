@extends('layouts.app')

@section('content')
<h2>依頼編集画面</h2>

<form action="{{ route('mycontent.update', ['id' => $content->id]) }}" method="post">
@method('PATCH')
@csrf
<tr>
<th><input type="text" name="title" value="{{$content->title}}" placeholder="タイトル"></th>
<th><input type="text" name="prefectures" value="{{$content->prefectures}}" placeholder="依頼先の都道府県"></th>
<th><input id="address"　type="text" name="address" value="{{$content->address}}" placeholder="住所入力"></th>
<input type="button" value="地図URL取得" onClick="codeAddress()">
<div id="addressfind">発見情報が表示される</div>
<th><input type="number" name="price" value="{{$content->price}}" placeholder="報酬"></th>
<th><input type="text" name="order" value="{{$content->order}}" placeholder="依頼内容"></th>
<input id="addressURL" type="hidden" name="gmap" value="{{$content->gmap}}" >
<th><input type="submit" value="送信"></th>
</tr>

<div id="latlngDisplay">{{-- ここに緯度、経緯が表示される --}}</div>
<div id="map"></div>
@endsection
<style>
#map{
  height: 600px;
  width: 600px;
}
#latlngDisplay{
  display:none;
}
</style>

<script src="{{ asset('/js/googlemap_api.js') }}"></script>
<script src="{{ asset('/js/apikey.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApeoUq6ta-vcz7YtJRf7wiDcUPLr5g5Yw&callback=initMap" async
  defer></script>
