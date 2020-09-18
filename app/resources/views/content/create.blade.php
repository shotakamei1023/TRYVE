@extends('layouts.bootstrap')

<h2>依頼作成画面</h2>

<form action="/content/check" method="post">
@csrf
<tr>
<th><input type="text" name="title" value="{{old('title')}}" placeholder="タイトル"></th>
<th><input type="text" name="address_first" value="{{old('address_first')}}" placeholder="都道府県"></th>
<th><input type="text" name="address_last" value="{{old('address_last')}}" placeholder="都道府県以下"></th>
<th><input type="number" name="price" value="{{old('price')}}" placeholder="報酬"></th>
<th><input type="text" name="order" value="{{old('order')}}" placeholder="依頼内容"></th>
<th><input type="submit" value="送信"></th>
</tr>
