<h2>Google Map Test</h2>
<input id="address" type="textbox" value="">
<input type="button" value="検索" onClick="codeAddress()">
<div id="latlngDisplay">ここに緯度、経緯が表示される</div>
<div id="addressDisplay">ここに住所が表示される</div>
<div id="addressURL">ここにURLが表示される</div>
<div id="map"></div>

<style>
#map{
  height: 600px;
  width: 600px;
}
</style>
<script>
        const latlngDis = document.getElementById('latlngDisplay');
        const addressDis = document.getElementById('addressDisplay');
        // let endData;
    function initMap(){

  tokyo = {lat: 35.6803997, lng: 139.7690174}

  map = new google.maps.Map(document.getElementById('map'), {
    center: tokyo,
    zoom: 12,
  });

}
function codeAddress(callback){
  geocoder = new google.maps.Geocoder();

  inputAddress = document.getElementById('address').value;

  geocoder.geocode({ 'address': inputAddress}, function(results, status){
    if (status == 'OK') {
      map.setCenter(results[0].geometry.location);
      marker = new google.maps.Marker({
        position: results[0].geometry.location,
        map: map,
      });
    latlngDis.innerHTML = results[0].geometry.location;
    const endData = latlngDis.innerHTML.split(',');
    console.log(endData);
    addressURL.innerHTML = "https://www.google.co.jp/maps/place/" + results[0].formatted_address.slice( 13 ) + "/@" + endData[0].slice( 1 ) + "," +endData[1].slice( 1, -1 ) +"," + "20z"

      geocoder.geocode({ 'location': marker.getPosition()}, function(results, status) {
        if (status == "OK"){
          addressDis.innerHTML = results[0].formatted_address;
        } else {
          alert("Geocode 取得に失敗しました：" + status);
        }
      });
    } else {
      alert("該当する結果がありませんでした：" + status);
    }
  });
}

</script>
@extends('layouts.apikey')
