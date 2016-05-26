@extends('templates.app')
@section('content')
	<h1>Rental return </h1>

	<hr/>

	<div class="row">
		<div class="col-md-6">
			<ul class="list-group">
				<li class="list-group-item">{{ $rental->rental_id }}</li>
				<li class="list-group-item">{{ $rental->customer_id }}</li>
				<li class="list-group-item">{{ $rental->customer->first_name }}</li>
			</ul>
		</div>
	</div>

	<a href="{{ url('rentals/'.$rental->rental_id.'/payment') }}" title="New Film" alt="New Film" class="btn btn-primary">
		Return Rental
	</a>
@stop




