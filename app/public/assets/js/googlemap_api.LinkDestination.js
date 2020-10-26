const GmapLink = document.getElementById('GmapLink');
console.log(GmapLink.href);
const ArrayDate = GmapLink.href.split('/');
console.log(ArrayDate);
const endDate = ArrayDate[6].split(',');
console.log(endDate);
console.log(endDate[0].slice(1));

function initMap() {
  var latlng = new google.maps.LatLng(endDate[0].slice(1), endDate[1]);//中心の緯度, 経度
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,//ズームの調整
    center: latlng//上で設定した中心
  });
  var marker = new google.maps.Marker({
    position: latlng,
    map: map
  });
}