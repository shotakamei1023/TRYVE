@extends('layouts.bootstrap')

<h2>確認画面</h2>

<form action="/content" method="post">
@csrf
<label>タイトル</label>
<div>{{ $inputs['title'] }}<input name="title" value="{{ $inputs['title'] }}" type="hidden"></div>
<br>
<label>都道府県</label>
<div>{{ $inputs['prefectures'] }}<input name="prefectures" value="{{ $inputs['prefectures'] }}" type="hidden"></div>
<br>
<label>都道府県以下</label>
<div>{{ $inputs['address'] }}<input name="address" value="{{ $inputs['address'] }}" type="hidden"></div>
<br>
<label>報酬</label>
<div>{{ $inputs['price'] }}<input name="price" value="{{ $inputs['price'] }}" type="hidden"></div>
<br>
<label>依頼内容</label>
<div>{{ $inputs['order'] }}<input name="order" value="{{ $inputs['order'] }}" type="hidden"></div>
<label>GMAP
</label>
<div>{{ $inputs['gmap'] }}<input name="gmap" value="{{ $inputs['gmap'] }}" type="hidden"></div>


    <button>
        <input type="submit" name="action" value="back">
    </button>
    <button>
        <input type="submit" name="action" value="submit">
    </button>