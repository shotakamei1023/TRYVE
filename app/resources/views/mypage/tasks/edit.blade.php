@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
                レポート提出画面
        </div>
        <div class="card-body">
            <form action="{{ route('mypage.tasks.update', ['id' => $content->id,'type' => 'report']) }}" method="post">
                @method('PATCH')
                @csrf
                <div>タイトル：{{ $content['title'] }}<input name="title" value="{{ $content['title'] }}" type="hidden"></div>
                <div>報酬：{{ $content['address'] }}<input name="address" value="{{ $content['address'] }}" type="hidden"></div>
                <div>依頼内容：{{ $content['order'] }}<input name="order" value="{{ $content['order'] }}" type="hidden"></div>
                <div>依頼先：{{ $content['placename'] }}<input name="placename" value="{{ $content['placename'] }}" type="hidden"></div>
                <div>依頼先の都道府県：{{ $content['prefectures'] }}<input name="prefectures" value="{{ $content['prefectures'] }}" type="hidden"></div>
                <div>依頼先都道府県以下の住所：{{ $content['address'] }}<input name="address" value="{{ $content['address'] }}" type="hidden"></div>
                <div><a href={{ $content['gmap'] }} target="_blank" class="btn btn-outline-info"><input name="gmap" value="{{ $content['gmap'] }}" type="hidden">依頼先の住所をGoogoleMapで開く</a></div>
                <div><textarea class="form-control" rows="4" name="report" placeholder="依頼された〇〇というお店のオムライスは絶品でした。王道のトマトケチャップオムライスがおすすめです。">{{old('report')}}</textarea></div>
                <input class="btn btn-outline-secondary mt-2" type="submit" name="action" value="戻る">
                <input class="btn btn-primary mt-2 ml-5" type="submit" name="action" value="レポートを提出する">
        </div>
</div>
@endsection
