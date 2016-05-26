@extends('templates.app')
@section('content')
	<div class="row">
		<a href="{{ action('StaffsController@edit', $staff->staff_id) }}" title="Edit Staff" alt="Edit Staff"><span class="glyphicon glyphicon-pencil"></span></a>
		<div class="col-md-2">
			<a href="#" class="thumbnail">
				<img src="data:image/png;base64,{!! base64_encode($staff->picture) !!}" alt="Picture" />
			</a>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Data</h3>
				</div>
				<div class="panel-body">
					
					<ul class="list-group">
						
						
						@if (!is_null($staff->manages))
							<li class="list-group-item">{{ $staff->manages->store_id == $staff->store->store_id ? 'Manager':'Staff' }} </li>
						@endif
						
						<li class="list-group-item">{{ $staff->first_name }} {{ $staff->last_name }}</li>
						<li class="list-group-item">{{ $staff->first_name }}</li>

						<li class="list-group-item">{{ $staff->email }}</li>
						<li class="list-group-item">{{ $staff->first_name }}</li>
						<li class="list-group-item"><span class="glyphicon glyphicon-{{ $staff->active? 'ok': 'remove' }}" aria-hidden="true"></span></li>
					</ul>
					
				</div>
			</div>
			
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Address</h3>
				</div>
				<div class="panel-body">
					
					<ul class="list-group">
						<li class="list-group-item">{{ $staff->address->address }}</li>
						<li class="list-group-item">{{ $staff->address->address2 }}</li>
						<li class="list-group-item">{{ $staff->address->district }}</li>
						<li class="list-group-item">{{ $staff->address->getCity() }}</li>
						<li class="list-group-item">{{ $staff->address->getCountry() }}</li>
						<li class="list-group-item">{{ $staff->address->postal_code }}</li>
						<li class="list-group-item">{{ $staff->address->phone }}</li>

					</ul>
					
				</div>
			</div>
		
		</div>

		
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Store</h3>
				</div>
				<div class="panel-body">
					
					<ul class="list-group">
						<li class="list-group-item">{{ $staff->store->address->address }}</li>
						<li class="list-group-item">{{ $staff->store->address->address2 }}</li>
						<li class="list-group-item">{{ $staff->store->address->district }}</li>
						<li class="list-group-item">{{ $staff->store->address->getCity() }}</li>
						<li class="list-group-item">{{ $staff->store->address->getCountry() }}</li>
						<li class="list-group-item">{{ $staff->store->address->postal_code }}</li>
						<li class="list-group-item">{{ $staff->store->address->phone }}</li>
					</ul>
					
				</div>
			</div>
		
		</div>
		

		


	</div>

@stop