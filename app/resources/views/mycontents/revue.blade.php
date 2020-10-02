@extends('layouts.base')

@section('content')
<form action="{{ route('mycontent.store', ['id' => $content->id]) }}" method="post">
@method('PATCH')
@csrf
<label>タイトル</label>
<div>{{ $content['title'] }}<input name="title" value="{{ $content['title'] }}" type="hidden"></div>
<br>
<label>報酬</label>
<div>{{ $content['price'] }}<input name="price" value="{{ $content['price'] }}" type="hidden"></div>
<br>
<label>依頼内容</label>
<div>{{ $content['order'] }}<input name="order" value="{{ $content['order'] }}" type="hidden"></div>
<label>GMAP
<div>{{ $content['gmap'] }}<input name="gmap" value="{{ $content['gmap'] }}" type="hidden"></div>
</label>
<br>
<label>提出されたレポート
<div>{{ $content['report'] }}<input name="report" value="{{ $content['report'] }}" type="hidden"></div>
</label>
<br>
<label>レポートに対する評価
<div>
        <input type="radio" name="value" value=5>大変満足
        <input type="radio" name="value" value=4>ほぼ満足
        <input type="radio" name="value" value=3>普通
        <input type="radio" name="value" value=2>やや不満足
        <input type="radio" name="value" value=1>不満足
</div>
</label>
<br>
<button>
        <input type="submit" name="action" value="back">
</button>
<button>
        <input type="submit" name="action" value="submit">
</button>
@endsection

