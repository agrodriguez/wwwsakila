@extends('templates.app')
@section('content')


	<h1>Customer <a href="{{ action('CustomersController@edit', $customer->customer_id) }}" title="Edit Customer" alt="Edit Customer"><span class="glyphicon glyphicon-pencil"></span></a></h1>
	<hr/>

	<h2>Balance : {{ $customer->getBalance() }}</h2>
	<div class="row">
		
	</div>

	<div class="row">
		<div class="col-md-5 col-md-offset-0">
			<ul class="list-group">
				<li class="list-group-item"><b>Fist name:</b> {{ $customer->first_name }}</li>
				<li class="list-group-item"><b>Last name:</b> {{ $customer->last_name }}</li>
				<li class="list-group-item"><b>email:</b> {{ $customer->email }}</li>
				<li class="list-group-item"><b>Active:</b> <span class="glyphicon glyphicon-{{ $customer->active? 'ok': 'remove' }}" aria-hidden="true"></span></li>
			</ul>
		</div>
		<div class="col-md-4 ">
			<p>Rentals</p>
			<ul class="list-group">
				@foreach( $customer->rentals->where('return_date',null) as $rental)
					<li class="list-group-item">{{ $rental->inventory->film->title }} 
					<a href="{{ url('rentals/'.$rental->rental_id) }}" title="New Film" alt="New Film" class="btn btn-primary btn-xs pull-right">
						Return Rental
					</a></li>
				@endforeach
			</ul>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-5 col-md-offset-0 ">
			<ul class="list-group">
				<li class="list-group-item"><b>Address:</b> {{ $customer->address->address }}</li>
				<li class="list-group-item"><b>Address2:</b> {{ $customer->address->address2 }}</li>
				<li class="list-group-item"><b>District:</b> {{ $customer->address->district }}</li>
				<li class="list-group-item"><b>City:</b> {{ $customer->address->getCity() }}</li>
				<li class="list-group-item"><b>Country:</b> {{ $customer->address->getCountry() }}</li>
				<li class="list-group-item"><b>Postal code:</b> {{ $customer->address->postal_code }}</li>
				<li class="list-group-item"><b>Phone:</b> {{ $customer->address->phone }}</li>				
			</ul>
		</div>
		<div class="col-md-7 ">
			<div class="col-sm-2"><b>Location:</b></div>
			<div class="col-sm-10"><div class="" id="map_div" style=" height: 300px; border: 1px solid #d4d065;"></div></div>
		</div>
	</div>
	
		

		@section('footer')
		<script type="text/javascript">

		var map;
		function initMap() {

			var latlng = new google.maps.LatLng({{ $customer->address->location }});


			map = new google.maps.Map(document.getElementById('map_div'), {
				center: latlng,
				zoom: 5
			});

			var marker = new google.maps.Marker({
				map: map,
				position: latlng,
				draggable: false,
			});

		}

		</script>
		<script async defer
	    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf55wT2Bn6Juy0yBok2tSuGU3nuNluTgw&callback=initMap">
	    </script>

	
		@endsection
@stop