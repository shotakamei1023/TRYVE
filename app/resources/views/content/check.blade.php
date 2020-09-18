@extends('layouts.bootstrap')

<h2>確認画面</h2>

<form action="/content" method="post">
@csrf
<label>タイトル</label>
<div>{{ $inputs['title'] }}<input name="title" value="{{ $inputs['title'] }}" type="hidden"></div>
<br>
<label>都道府県</label>
<div>{{ $inputs['address_first'] }}<input name="address_first" value="{{ $inputs['address_first'] }}" type="hidden"></div>
<br>
<label>都道府県以下</label>
<div>{{ $inputs['address_last'] }}<input name="address_last" value="{{ $inputs['address_last'] }}" type="hidden"></div>
<br>
<label>報酬</label>
<div>{{ $inputs['price'] }}<input name="price" value="{{ $inputs['price'] }}" type="hidden"></div>
<br>
<label>依頼内容</label>
<div>{{ $inputs['order'] }}<input name="order" value="{{ $inputs['order'] }}" type="hidden"></div>

    <button>
        <input type="submit" name="action" value="back">
    </button>
    <button>
        <input type="submit" name="action" value="submit">
    </button>