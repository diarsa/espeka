<style>
  #map-canvas{
    width: 700px;
    height: 500px;
  }
</style>

<?php /* <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> */ ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php /* <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places" type="text/javascript"></script> */ ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfxqLigR-5aAO8qQ0jjz3tuUt4XjUVsC4&libraries=places" type="text/javascript"></script>


<?php /* <script>
  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: -8.297588400000002,
      lng: 115.35487130000001
    },
    zoom:15
  });
  var marker = new google.maps.Marker({
    position: {
      lat: -8.297588400000002,
      lng: 115.35487130000001
    },
    map: map,
    draggable: true
  });
  var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
  google.maps.event.addListener(searchBox,'places_changed',function(){
    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();
    var i, place;
    for(i=0; place=places[i];i++){
        bounds.extend(place.geometry.location);
        marker.setPosition(place.geometry.location); //set marker position new...
      }
      map.fitBounds(bounds);
      map.setZoom(15);
  });
  google.maps.event.addListener(marker,'position_changed',function(){
    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();
    $('#lat').val(lat);
    $('#lng').val(lng);
  });
</script> */ ?>