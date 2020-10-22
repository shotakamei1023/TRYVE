@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
                依頼詳細画面 
        </div>
        <div class="card-body">
                <div>タイトル：{{$content->title}}</div>
                <div>依頼先：{{$content->placename}}</div>
                <div>依頼先の都道府県：{{$content->prefectures}}</div>
                <div>依頼先住所：{{$content->address}}</div>
                <div>報酬：{{$content->price}}</div>
                <div>依頼内容：{{$content->order}}</div>
                <div><a href={{$content->gmap}} class="btn btn-primary">依頼先のGoolemapURLリンク</a></div>
        </div>
</div>
@endsection