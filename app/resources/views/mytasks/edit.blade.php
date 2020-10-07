@extends('layouts.app')

@section('content')
<form action="{{ route('mytask.submit', ['id' => $content->id]) }}" method="post">
@method('PATCH')
@csrf
<label>タイトル</label>
<div>{{ $content['title'] }}<input name="title" value="{{ $content['title'] }}" type="hidden"></div>
<br>
<label>都道府県</label>
<div>{{ $content['prefectures'] }}<input name="prefectures" value="{{ $content['prefectures'] }}" type="hidden"></div>
<br>
<label>都道府県以下</label>
<div>{{ $content['address'] }}<input name="address" value="{{ $content['address'] }}" type="hidden"></div>
<br>
<label>報酬</label>
<div>{{ $content['price'] }}<input name="price" value="{{ $content['price'] }}" type="hidden"></div>
<br>
<label>依頼内容</label>
<div>{{ $content['order'] }}<input name="order" value="{{ $content['order'] }}" type="hidden"></div>
<label>GMAP
<div>{{ $content['gmap'] }}<input name="gmap" value="{{ $content['gmap'] }}" type="hidden"></div>
</label>
<div><input type="text" name="report" value="{{$content->report}}" placeholder="提出するレポート"></div>

    <button>
        <input type="submit" name="action" value="back">
    </button>
    <button>
        <input type="submit" name="action" value="submit">
    </button>
@endsection

