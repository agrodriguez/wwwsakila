@extends('templates.app')
@section('content')

	<h1>Address</h1>

	<hr/>

	<div class="row">
		<div class="col-md-5 col-md-offset-0 ">
			<ul class="list-group">
				<li class="list-group-item">Address: {{ $address->address }}</li>
				<li class="list-group-item">Address2: {{ $address->address2 }}</li>
				<li class="list-group-item">District: {{ $address->distrrict }}</li>
				<li class="list-group-item">City: {{ $address->getCity() }}</li>
				<li class="list-group-item">Country: {{ $address->getCountry() }}</li>
				<li class="list-group-item">Postal code:{{ $address->postal_code }}</li>
				<li class="list-group-item">Phone: {{ $address->phone }}</li>
				{{-- <li class="list-group-item">location {{ $address->location }}</li> --}}
			</ul>
		</div>
		<div class="col-md-7 ">
			<div class="col-sm-2">Location:</div>
			<div class="col-sm-10"><div class="" id="map_div" style=" height: 300px; border: 1px solid #d4d065;"></div></div>
		</div>
	</div>
	
		

		@section('footer')
		<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
      type="text/javascript"></script>

		<script type="text/javascript">
		loadMap({{ $address->location }})

		function loadMap(long, lat) {
			if (GBrowserIsCompatible()) {
				var map = new GMap2(document.getElementById("map_div"));
				map.addControl(new GSmallMapControl());
				map.addControl(new GMapTypeControl());
				var center = new GLatLng(lat, long);
				map.setCenter(center,5);
				geocoder = new GClientGeocoder();
				var marker = new GMarker(center, {
					draggable: false
				});
				map.addOverlay(marker);
				
			
			}
		}
		</script>
	
		@endsection
	
@stop