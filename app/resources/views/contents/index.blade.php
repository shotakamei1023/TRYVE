@extends('layouts.app')

@section('search')
<h3>依頼検索画面</h3>
<form action="/contents/find" method="post">
@csrf
        <div class="form-row">
                <div class="col">
                        <input type="text" class="form-control" name="title" value="{{$title}}" placeholder="タイトル">
                </div>
                <div class="col">
                        <input type="text" class="form-control" name="prefectures" value="{{$prefectures}}" placeholder="都道府県">
                </div>
                <div class="col">
                        <input type="number" class="form-control" name="price" value="{{$price}}" placeholder="報酬">
                </div>
                <input class='btn btn-secondary' type="submit" value="検索"> 
        </div>
</form>
@endsection

@section('content')
@if (session('flash_message'))
        <div class="flash_message alert alert-warning">
                {{ session('flash_message') }}
        </div>
@elseif (session('msg_success'))
        <div class="msg_success alert alert-success">
                {{ session('msg_success') }}
        </div>
@endif
<table class="table table-hover">
  <thead class="thead-light">
    <tr>
        <th scope="col">依頼タイトル</th>
        <th scope="col">都道府県</th>
        <th scope="col">報酬</th>
        <th scope="col">作成者</th>
        <th scope="col">申請者人数</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach($contents as $content)
    <tr>
        <th scope="row">{{$content->title}}</th>
        <td>{{$content->prefectures}}</td>
        <td>{{$content->price}}</td>
        <td>{{$content->owner->name}}</td>
        <td >{{DB::table('content_items')->where('content_id','=',$content->id)->whereNull('deleted_at')->count()}}人</td>
        <td><button type="button" class="btn btn-info" ><a href="{{ route('content.show', ['id' => $content->id]) }}"><font color=white>詳細</font></a></button></td>
        <td><form method="post" action="{{ route('content.post', ['id' => $content->id]) }}">@method('PATCH')@csrf<input class="btn btn-primary" type="submit" value="代行申請" ></form></td>
    </tr>
        @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $contents->links() }}
</div>
@endsection

@section('create')
<button type="button" class="btn btn-success"><a href="{{ action('ContentsController@create') }}"><font color=white>依頼作成</font></a></button>
@endsection

