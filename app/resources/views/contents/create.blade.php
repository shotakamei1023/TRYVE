@extends('layouts.app')
@section('title')
<h1 class="font-weight-bold">デート作成</h1>
<p>試してほしいデートプランを作成することができます。</p>
@endsection
@section('content')
  <div class="card">
    <div class="card-body">

        @if($errors->any())
          <div>
            @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
          </div>
        @endif
      <form action="/contents/create/check" method="post">
        @csrf
        <table class="table table-borderless">
          <tbody>
            <tr class="text-md-right">
              <td><label for="title" class="col-form-label">{{ __('タイトルを入力') }}</label></td>
              <td class="w-75"><input class="form-control" type="text" name="title" value="{{old('title')}}" placeholder="〇〇の下見へ行ってください"></td>
            </tr>
            <tr class="text-md-right">
              <td><label for="price" class="col-form-label">{{ __('相手に支払う金額を入力') }}</label></td>
              <td><input class="form-control" type="number" name="price" value="{{old('price')}}" placeholder="半角数字で数値のみの入力"></td>
            </tr>
            <tr class="text-md-right">
              <td><label for="title" class="col-form-label">{{ __('相手にお願いする依頼の内容を入力') }}</label></td>
              <td><textarea class="form-control" rows="4" name="order" placeholder="東京駅中にある〇〇というお店でオムライスを食べ、美味しさをを教えてください">{{old('order')}}</textarea></td>
            </tr>
            <tr class="text-md-right">
              <td><label for="title" class="col-form-label">{{ __('地名やお店の名前を入力') }}</label></td>
              <td>
                <div>
                  <input class="form-control mapSearch" type="text" id="placename" name="placename" value="{{old('placename')}}" placeholder="スカイツリー">
                  <input class="btn btn-outline-info w-25" type="button" value="住所を取得" onClick="codeAddress()">
                </div>
                <div id="map_box">
                  <div id="map"></div>
                </div>
              </td>
            </tr>
            <tr class="text-md-right">
              <td><label for="title" class="col-form-label">{{ __('都道府県') }}</label></td>
              <td><input class="form-control" id="prefectures" type="text" name="prefectures" value="{{old('prefectures')}}" placeholder="自動入力されます"></td>
            </tr>
            <tr class="text-md-right">
              <td><label for="title" class="col-form-label">{{ __('都道府県以下') }}</label></td>
              <td><input class="form-control" id="address"　type="text" name="address" value="{{old('address')}}" placeholder="自動入力されます"></td>
            </tr>
          </tbody>
        </table>
        <input id="addressURL" type="hidden" name="gmap" value="{{old('gmap')}}" >
        <input class='btn btn-primary w-75 mx-auto d-block' type="submit" value="入力内容の確認">
        <div id="latlngDisplay" class='d-none'></div>
      </form>
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
