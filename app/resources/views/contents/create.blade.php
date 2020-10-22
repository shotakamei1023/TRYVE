@extends('layouts.app')

@section('content')
<div id='box'>
  <div class="card">
    <div class="card-header">
      依頼作成画面
    </div>
    <div class="card-body">
      <form action="/contents/create/check" method="post">
      @csrf
        @if($errors->any())
          <div>
            @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
          </div>
        @endif
      <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タイトルを入力') }}</label>
        <div ><input class="form-control" type="text" name="title" value="{{old('title')}}" placeholder="〇〇の下見へ行ってください"></div>
      </div>
      <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('相手に支払う金額を入力') }}</label>
        <div ><input class="form-control" type="number" name="price" value="{{old('price')}}" placeholder="半角数字で数値のみの入力"></div>
      </div>
      <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('相手にお願いする依頼の内容を入力') }}</label>
        <div><textarea class="form-control" rows="4" name="order" placeholder="東京駅中にある〇〇というお店でオムライスを食べ、美味しさをを教えてください">{{old('order')}}</textarea></div>
      </div>
      <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('地名やお店の名前を入力') }}</label>
        <div ><input class="form-control" type="text" id="placename" name="placename" value="{{old('placename')}}" placeholder="スカイツリー"></div>
      </div>
      <div id="map_box">
        <div id="map"></div>
      </div>
      <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('地名の住所を検索') }}</label>
        <div ><input class="btn btn-outline-info" type="button" value="住所の情報を取得" onClick="codeAddress()"></div>
      </div>
      <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('都道府県') }}</label>
        <div ><input class="form-control" id="prefectures" type="text" name="prefectures" value="{{old('prefectures')}}" placeholder="自動入力されます"></div>
      </div>
      <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('都道府県以下') }}</label>
        <div ><input class="form-control" id="address"　type="text" name="address" value="{{old('address')}}" placeholder="自動入力されます"></div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <input class='btn btn-primary' type="submit" value="送信">
        </div>
      </div>
      <div><input id="addressURL" type="hidden" name="gmap" value="{{old('gmap')}}" ></div>
      <div id="latlngDisplay">ここに緯度、経緯が表示される</div>
  </form>
</div>
</div>

<style>
#map{
  height: 200px;
  width: 300px;
}
#latlngDisplay{
  display:none;
}
#box{
  width: 70%;
  margin: 0 auto;
}
#map_box{
  margin: 15px;
  margin-left: 30%;
}
</style>

<script src="{{ asset('/assets/js/googlemap_api.js') }}"></script>
<script src="{{ asset('/assets/js/apikey.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApeoUq6ta-vcz7YtJRf7wiDcUPLr5g5Yw&callback=initMap" async
  defer></script>
@endsection
