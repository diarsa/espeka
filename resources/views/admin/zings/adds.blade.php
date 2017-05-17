<style>
	#map-canvas{
		width: 350px;
		height: 250px;
	}
</style>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"
  type="text/javascript"></script>

<div class="container">
	<div class="col-sm-4">
		<h1>Add Vendor, Location</h1>
		{{Form::open(array('url'=>'/vendor/add', 'files'=>true))}}
			<div class="form-group">
				<label for="">Title</label>
				<input type="text" class="form-control input-sm" name="title">
			</div>

			<div class="form-group">
				<label for="">Map</label>
				<input type="text" id="searchmap">
				<div id="map-canvas"></div>
			</div>

			<div class="form-group">
				<label for="">Lat</label>
				<input type="text" class="form-control input-sm" name="lat" id="lat">
			</div>

			<div class="form-group">
				<label for="">Lng</label>
				<input type="text" class="form-control input-sm" name="lng" id="lng">
			</div>

			<button class="btn btn-sm btn-danger">Save</button>
		{{Form::close()}}
	</div>

</div>

<script>
	var lat = 27.72;
	var lng = 85.36;

	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
			lat: lat,
			lng: lng
		},
		zoom: 15
	});

	var marker = new google.maps.Marker({
    position:{
      lat:lat,
      lng: lng
    },
    map:map
  });

</script>
