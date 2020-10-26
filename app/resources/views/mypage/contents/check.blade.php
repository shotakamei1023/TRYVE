@extends('layouts.mypage')
@section('title')
<h1 class="font-weight-bold">デート情報確認</h1>
<p>この内容でよろしければ”作成する”をクリックしてください。</p>
@endsection
@section('content')
<div class="card">
        {{-- <div class="card-header">
                入力確認画面
        </div> --}}
        <div class="card-body">
            <form action="/contents/create/store" method="post">
                @csrf
                 <table class="table table-borderless">
                    <tbody>
                        <tr class="text-md-right">
                            <td>タイトル</td>
                            <td class="w-75 text-md-left">{{ $inputs['title'] }}<input name="title" value="{{ $inputs['title'] }}" type="hidden"></td>
                        </tr>
                        <tr class="text-md-right">
                            <td>報酬</td>
                            <td class="w-75 text-md-left">{{ $inputs['price'] }}<input name="price" value="{{ $inputs['price'] }}" type="hidden"></td>
                        </tr>
                        <tr class="text-md-right">
                            <td>依頼内容</td>
                            <td class="w-75 text-md-left">{{ $inputs['order'] }}<input name="order" value="{{ $inputs['order'] }}" type="hidden"></td>
                        </tr>
                        <tr class="text-md-right">
                            <td>依頼先</td>
                            <td class="w-75 text-md-left">{{ $inputs['placename'] }}<input name="placename" value="{{ $inputs['placename'] }}" type="hidden"></td>
                        </tr>
                        <tr class="text-md-right">
                            <td>地図</td>
                            <td><div id="map"></div>
                            <a href={{ $inputs['gmap'] }} target="_blank" class="btn btn-outline-info" id="GmapLink"><input name="gmap" value="{{ $inputs['gmap'] }}" type="hidden">依頼先の住所をGoogoleMapで開く</a>
                            </td>
                        </tr>
                        <tr class="text-md-right">
                            <td>依頼先の都道府県</td>
                            <td class="w-75 text-md-left">{{ $inputs['prefectures'] }}<input name="prefectures" value="{{ $inputs['prefectures'] }}" type="hidden"></td>
                        </tr>
                        <tr class="text-md-right">
                            <td>依頼先都道府県以下の住所</td>
                            <td class="w-75 text-md-left">
                                {{ $inputs['address'] }}<input name="address" value="{{ $inputs['address'] }}" type="hidden">
                            </td>
                        </tr>
                    </tbody>
                 </table>
                <input class="btn btn-outline-secondary mt-2" type="submit" name="action" value="入力画面へ戻る">
                <input class="btn btn-primary mt-2 ml-5" type="submit" name="action" value="作成する">
            </form>
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
