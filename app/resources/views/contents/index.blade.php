@extends('layouts.base')

@section('search')
<h2>依頼検索画面</h2>
<form action="/contents/find" method="post">
@csrf
<input type="text" name="title" value="{{$title}}" placeholder="タイトル">
<input type="text" name="prefectures" value="{{$prefectures}}" placeholder="都道府県">
<input type="number" name="price" value="{{$price}}" placeholder="報酬">
<input type="submit" value="検索"> 
</form>
@endsection

@section('content')
@if (session('flash_message'))
        <div class="flash_message">
                {{ session('flash_message') }}
        </div>
@endif
@foreach($items as $item)
<table>
<tr>
        <td>{{$item->title}}</td>
        <td>{{$item->prefectures}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{DB::table('content_items')->where('content_id','=',$item->id)->count()}}</td>
        <td><button type="button" class="btn btn-info" ><a href="{{ route('content.show', ['id' => $item->id]) }}"><font color=white>詳細</font></a></button></td>
        <td><form method="post" action="{{ route('content.post', ['id' => $item->id]) }}">@method('PATCH')@csrf<input type="submit" value="代行申請" ></form></td>
<tr>
</table>
@endforeach
@endsection

@section('create')
<button type="button" class="btn btn-success"><a href="{{ action('ContentsController@create') }}"><font color=white>依頼作成</font></a></button>
@endsection