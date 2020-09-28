@extends('layouts.base')

@section('search')
<h2>依頼検索画面</h2>
<form action="/content/find" method="post">
@csrf
<input type="text" name="title" value="{{$title}}" placeholder="タイトル">
<input type="text" name="prefectures" value="{{$prefectures}}" placeholder="都道府県">
<input type="number" name="price" value="{{$price}}" placeholder="報酬">
<input type="submit" value="検索"> 
</form>
@endsection

@section('content')
{{ Auth::user()->name }}がログインしてます
@foreach($items as $item)
<table>
<tr>
        <td>{{$item->title}}</td>
        <td>{{$item->prefectures}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{DB::table('content_items')->where('content_id','=',$item->id)->count()}}</td>
<tr>
</table>
@endforeach
@endsection

@section('create')
<button type="button" class="btn btn-success"><a href="{{ action('ContentsController@create') }}">依頼作成</a></button>
@endsection