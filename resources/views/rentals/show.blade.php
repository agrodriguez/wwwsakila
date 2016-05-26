@extends('templates.app')
@section('content')
	<h1>Rental return </h1>

	<hr/>

	{!! Form::open(['action'=>['RentalsController@update',$rental->rental_id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
		
		<div class="row">
			<div class="col-md-4 col-md-offset-4">

				
				

				{!! Form::hidden('store_id',Auth::user()->store_id ,['id'=>'store_id']) !!}
				{!! Form::hidden('staff_id',Auth::user()->staff_id ,['id'=>'staff_id']) !!}


			</div>
			

		</div>
		<hr />
		<div class="row">
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					{!! Form::submit('Return Rental',['class'=>'btn btn-primary form-control']) !!}			
				</div>
			</div>
		</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<ul class="list-group">
				<li class="list-group-item">{{ $rental->rental_id }}</li>
				<li class="list-group-item">{{ $rental->customer_id }}</li>
				<li class="list-group-item">{{ $rental->customer->getFullName() }}</li>
			</ul>
		</div>
	</div>
	

	
@stop




