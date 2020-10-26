@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
                入力確認画面
        </div>
        <div class="card-body">
            <form action="{{ route('mypage.contents.review.put', ['id' => $content->id]) }}" method="post">
                @method('PATCH')
                @csrf
                <div>タイトル：{{ $content['title'] }}<input name="title" value="{{ $content['title'] }}" type="hidden"></div>
                <div>報酬：{{ $content['address'] }}<input name="address" value="{{ $content['address'] }}" type="hidden"></div>
                <div>依頼内容：{{ $content['order'] }}<input name="order" value="{{ $content['order'] }}" type="hidden"></div>
                <div>依頼先：{{ $content['placename'] }}<input name="placename" value="{{ $content['placename'] }}" type="hidden"></div>
                <div>依頼先の都道府県：{{ $content['prefectures'] }}<input name="prefectures" value="{{ $content['prefectures'] }}" type="hidden"></div>
                <div>依頼先都道府県以下の住所：{{ $content['address'] }}<input name="address" value="{{ $content['address'] }}" type="hidden"></div>
                <div>レポートの内容：{{ $content['report'] }}<input name="report" value="{{ $content['report'] }}" type="hidden"></div>
                <div><a href={{ $content['gmap'] }} target="_blank" class="btn btn-outline-info"><input name="gmap" value="{{ $content['gmap'] }}" type="hidden">依頼先の住所をGoogoleMapで開く</a></div>
                <div>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="value" value=5>
                                <label class="form-check-label" for="radio1">大満足</label>
                        </div>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="value" value=4>
                                <label class="form-check-label" for="radio2">ほぼ満足</label>
                        </div>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="value" value=3>
                                <label class="form-check-label" for="radio3">普通</label>
                        </div>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="value" value=2>
                                <label class="form-check-label" for="radio4">やや不満足</label>
                        </div>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="value" value=1>
                                <label class="form-check-label" for="radio5">不満足</label>
                        </div>
                </div>                
                <input class="btn btn-outline-secondary mt-2" type="submit" name="action" value="戻る">
                <input class="btn btn-primary mt-2 ml-5" type="submit" name="action" value="レポートの評価をする">
        </div>
</div>
@endsection

