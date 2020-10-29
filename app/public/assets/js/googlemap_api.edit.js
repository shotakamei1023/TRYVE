const latlngDis = document.getElementById('latlngDisplay');
const GmapLink = document.getElementById('addressURL');
console.log(GmapLink);
const ArrayDate = GmapLink.value.split('/');
console.log(ArrayDate);
const endDate = ArrayDate[6].split(',');
console.log(endDate);
console.log(endDate[0].slice(1));

function initMap() {
  var latlng = new google.maps.LatLng(endDate[0].slice(1), endDate[1]);//中心の緯度, 経度

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,//ズームの調整
    center: latlng//上で設定した中心
  });

}
function codeAddress() {
  geocoder = new google.maps.Geocoder();

  inputAddress = document.getElementById('placename').value;


  geocoder.geocode({ 'address': inputAddress }, function (results, status) {
    if (status == 'OK') {

      map.setCenter(results[0].geometry.location);
      marker = new google.maps.Marker({
        position: results[0].geometry.location,
        map: map,
      });

      latlngDis.innerHTML = results[0].geometry.location;
      const endData = latlngDis.innerHTML.split(',');
      const addresdata = results[0].formatted_address.split(' ');
      const findresult = addresdata[0].match('〒');
      const addressURL = document.getElementById('addressURL');
      const prefectures = document.getElementById('prefectures');
      const address = document.getElementById('address');

      console.log(endData);
      console.log(addresdata);
      console.log(findresult);
      console.log(addresdata[1].substr(3, 1));
      console.log(addresdata[1].substr(0, 3));

      if (addresdata[1].substr(3, 1) == "県") {
        prefectures.value = addresdata[1].substr(0, 4);
        address.value = addresdata[1].substr(4, addresdata[1].length);
      } else {
        prefectures.value = addresdata[1].substr(0, 3);
        address.value = addresdata[1].substr(3, addresdata[1].length);
      }

      addressURL.value = "https://www.google.co.jp/maps/place/" + addresdata[1] + "/@" + endData[0].slice(1) + "," + endData[1].slice(1, -1) + "," + "17z";

      geocoder.geocode({ 'location': marker.getPosition() }, function (addresdata) {
        if (findresult != null) {
          alert("依頼先の住所を発見できました。");
        } else {
          alert("入力された情報では、依頼先の住所を発見することができませんでした。");
        }
      });
    } else {
      alert("該当する結果がありませんでした：");
    }
  });
}

