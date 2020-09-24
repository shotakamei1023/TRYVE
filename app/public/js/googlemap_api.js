const latlngDis = document.getElementById('latlngDisplay');
function initMap() {

  tokyo = { lat: 35.6803997, lng: 139.7690174 }

  map = new google.maps.Map(document.getElementById('map'), {
    center: tokyo,
    zoom: 12,
  });

}
function codeAddress() {
  geocoder = new google.maps.Geocoder();

  inputAddress = document.getElementById('address').value;

  geocoder.geocode({ 'address': inputAddress }, function (results, status) {
    if (status == 'OK') {


      map.setCenter(results[0].geometry.location);
      marker = new google.maps.Marker({
        position: results[0].geometry.location,
        map: map,
      });
      latlngDis.innerHTML = results[0].geometry.location;
      const a = results[0].geometry.location;
      const endData = latlngDis.innerHTML.split(',');

      console.log(endData);
      console.log(a);

      const addressURL = document.getElementById('addressURL');
      addressURL.value = "https://www.google.co.jp/maps/place/" + results[0].formatted_address.slice(13) + "/@" + endData[0].slice(1) + "," + endData[1].slice(1, -1) + "," + "20z"
      geocoder.geocode({ 'location': marker.getPosition() }, function (results, status) {
        if (status == "OK") {
          const addressfind = document.getElementById('addressfind');
          addressfind.innerHTML = "見つかったぽよ"
        } else {
          alert("Geocode 取得に失敗しました：" + status);
        }
      });
    } else {
      alert("該当する結果がありませんでした：" + status);
    }
  });
}

