@extends('layouts.app')
@section('title')
  {{$content->title}}
@endsection
@section('tag')
        <div class="badge badge-light">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bicycle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443l-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057L9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z"/>
                </svg>
                {{$content->prefectures}}
        </div>
        <div class="badge badge-light">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M15 4H1v8h14V4zM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z"/>
                <path d="M13 4a2 2 0 0 0 2 2V4h-2zM3 4a2 2 0 0 1-2 2V4h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 12a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                </svg>
                {{$content->price}}
        </div>
        <div class="badge badge-light">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
                {{$content->owner->name}}
        </div>
@endsection
@section('content')
<div class="card">
        <div class="card-body">
                <div class="pb-3">
                        {{$content->order}}
                </div>
                <h4 class="font-weight-bold">デート代行依頼詳細</h4>
                <table class="table table-bordered">
                        <tbody>
                        <tr>
                        <td>依頼先</td>
                        <td>{{$content->placename}}</td>
                        </tr>
                         <tr>
                        <td>依頼先の都道府県</td>
                        <td>{{$content->prefectures}}</td>
                        </tr>
                         <tr>
                        <td>依頼先住所</td>
                        <td>{{$content->address}}</td>
                        </tr>
                         <tr>
                        <td>報酬</td>
                        <td>{{$content->price}}</td>
                        </tr>
                        <tr>
                        <td>地図</td>
                        <td><div id="map"></div></td>
                        </tr>
                        <tr>
                        <td>地図のリンク</td>
                        <td><a href={{$content->gmap}} class="btn btn-primary" id=GmapLink target="_blank">依頼先のGoolemapURLリンク</a></td>
                        </tr>
                        </tbody>
                </table>
                {{-- 代行する人が決まっていたらボタンを表示しない --}}
                @if( isset ( $content->helper_id ) )
                @elseif( $content->owner_id == Auth::user()->id)
                @else<form method="post" action="{{ route('contents.store', ['id' => $content->id]) }}">@method('PATCH')@csrf<input type="submit" value="デート代行する" class="btn btn-primary btn-lg w-100 mt-2"></form>
                @endif
        </div>
</div>
<style>
#map{
    height: 200px;
    width: 100%;
}

</style>
<script src="{{ asset('/assets/js/googlemap_api.LinkDestination.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_api') }}&callback=initMap"></script>
@endsection