@extends('layouts.mypage')

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
        {{-- <div id="map"></div> --}}
      </form>
    </div>
  </div>



{{-- <form action="{{ route('mycontent.update', ['id' => $content->id]) }}" method="post">
@method('PATCH')
@csrf
<tr>
<th><input type="text" name="title" value="{{$content->title}}" placeholder="タイトル"></th>
<th><input type="text" name="prefectures" value="{{$content->prefectures}}" placeholder="依頼先の都道府県"></th>
<th><input id="address"　type="text" name="address" value="{{$content->address}}" placeholder="住所入力"></th>
<input type="button" value="地図URL取得" onClick="codeAddress()">
<div id="addressfind">発見情報が表示される</div>
<th><input type="number" name="price" value="{{$content->price}}" placeholder="報酬"></th>
<th><input type="text" name="order" value="{{$content->order}}" placeholder="依頼内容"></th>
<input id="addressURL" type="hidden" name="gmap" value="{{$content->gmap}}" >
<th><input type="submit" value="送信"></th>
</tr> --}}


@endsection
<style>
#map{
  height: 600px;
  width: 600px;
}
#latlngDisplay{
  display:none;
}
</style>

<script src="{{ asset('/js/googlemap_api.js') }}"></script>
<script src="{{ asset('/js/apikey.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApeoUq6ta-vcz7YtJRf7wiDcUPLr5g5Yw&callback=initMap" async
  defer></script>
