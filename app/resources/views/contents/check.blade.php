@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
                入力確認画面
        </div>
        <div class="card-body">
            <form action="/contents/create/store" method="post">
                @csrf
                <div>タイトル：{{ $inputs['title'] }}<input name="title" value="{{ $inputs['title'] }}" type="hidden"></div>
                <div>報酬：{{ $inputs['price'] }}<input name="price" value="{{ $inputs['price'] }}" type="hidden"></div>
                <div>依頼内容：{{ $inputs['order'] }}<input name="order" value="{{ $inputs['order'] }}" type="hidden"></div>
                <div>依頼先：{{ $inputs['placename'] }}<input name="placename" value="{{ $inputs['placename'] }}" type="hidden"></div>
                <div>依頼先の都道府県：{{ $inputs['prefectures'] }}<input name="prefectures" value="{{ $inputs['prefectures'] }}" type="hidden"></div>
                <div>依頼先都道府県以下の住所：{{ $inputs['address'] }}<input name="address" value="{{ $inputs['address'] }}" type="hidden"></div>
                <div><a href={{ $inputs['gmap'] }} target="_blank" class="btn btn-outline-info"><input name="gmap" value="{{ $inputs['gmap'] }}" type="hidden">依頼先の住所をGoogoleMapで開く</a></div>
                <input class="btn btn-outline-secondary mt-2" type="submit" name="action" value="入力画面へ戻る">
                <input class="btn btn-primary mt-2 ml-5" type="submit" name="action" value="送信する">
        </div>
</div>
@endsection
