@extends('layouts.app')
@section('title')
<h1 class="font-weight-bold">デート編集画面</h1>
<p>デートの情報を編集することができます。</p>
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
      <form action="{{ route('mypage.contents.update', ['id' => $content->id,'type' => 'content']) }}" method="post">
        @method('PATCH')
        @csrf

        <table class="table table-borderless">
          <tbody>
            <tr  class="text-md-right row">
              <td class="col-xs-10 col-sm-4"><label for="title" class="col-form-label">{{ __('タイトルを入力') }}</label></td>
              <td class="col-xs-10 col-sm-6"><input class="form-control" type="text" name="title" value="{{$content->title}}" placeholder="〇〇の下見へ行ってください"></td>
            </tr>
            <tr class="text-md-right row">
              <td class="col-xs-10 col-sm-4"><label for="price" class="col-form-label">{{ __('相手に支払う金額を入力') }}</label></td>
              <td class="col-xs-10 col-sm-6"><input class="form-control" type="number" name="price" value="{{$content->price}}" placeholder="半角数字で数値のみの入力"></td>
            </tr>
            <tr class="text-md-right row">
              <td class="col-xs-10 col-sm-4"><label for="title" class="col-form-label">{{ __('相手にお願いする依頼の内容を入力') }}</label></td>
              <td class="col-xs-10 col-sm-6"><textarea class="form-control" rows="4" name="order" placeholder="東京駅中にある〇〇というお店でオムライスを食べ、美味しさをを教えてください">{{$content->order}}</textarea></td>
            </tr>
            <tr class="text-md-right row">
              <td class="col-xs-10 col-sm-4"><label for="title" class="col-form-label">{{ __('地名やお店の名前を入力') }}</label></td>
              <td class="col-xs-10 col-sm-6">
                <div>
                  <input class="form-control mapSearch" type="text" id="placename" name="placename" value="{{$content->placename}}" placeholder="スカイツリー">
                  <input class="btn btn-outline-info w-25" type="button" value="住所を取得" onClick="codeAddress()">
                </div>
                <div id="map_box">
                  <div id="map"></div>
                </div>
              </td>
            </tr>
            <tr class="text-md-right row">
              <td class="col-xs-10 col-sm-4"><label for="title" class="col-form-label">{{ __('都道府県') }}</label></td>
              <td class="col-xs-10 col-sm-6"><input class="form-control" id="prefectures" type="text" name="prefectures" value="{{$content->prefectures}}" placeholder="自動入力されます"></td>
            </tr>
            <tr class="text-md-right row">
              <td class="col-xs-10 col-sm-4"><label for="title" class="col-form-label">{{ __('都道府県以下') }}</label></td>
              <td class="col-xs-10 col-sm-6"><input class="form-control" id="address"　type="text" name="address" value="{{$content->address}}" placeholder="自動入力されます"></td>
            </tr>
          </tbody>
          <input id="addressURL" type="hidden" name="gmap" value="{{$content->gmap}}" >
        </table>
        <input class='btn btn-primary w-75 mx-auto d-block' type="submit" value="編集の完了">
        <div id="latlngDisplay" class='d-none'></div>
      </form>
    </div>
  </div>

<style>
#map{
  height: 200px;
  width: 100%;
}

</style>

<script src="{{ asset('/assets/js/googlemap_api.edit.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_api') }}&callback=initMap"></script>
@endsection
