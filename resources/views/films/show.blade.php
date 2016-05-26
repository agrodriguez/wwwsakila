@extends('templates.app')
@section('content')
	<div class="row">
		<div>
			Last Update : {{ $film->last_update->diffForHumans() }} {{-- <a href="{{ action('FilmsController@edit', $film->id) }}"><span class="glyphicon glyphicon-pencil"></span></a> --}}
			<h1>{{ $film->title }} <a href="{{ action('FilmsController@edit', $film->film_id) }}" title="Edit Film" alt="Edit Film"><span class="glyphicon glyphicon-pencil"></span></a></h1>
			<p>@if(count($film->categories)) 				
				@foreach ($film->categories as $category)
					<span class="label label-primary">{{ $category->name }}</span>
				@endforeach				
			@endif
			</p>
		</div>
	</div>
	<div class="row">
			<div class="well"><p>{{ $film->description }}</p></div>
	</div>
	<div>
		<h3>Inventory on store</h3>

		{{-- $film->inventories->find(6)->rentals->last()->rental_date --}}
		{{-- $inventory->rentals->last()['return_date'] --}}

		
		{{--*/ $var = '0' /*--}}
		<ul>
			@foreach ($film->inventories->where('store_id',Auth::user()->store_id) as $inventory)
				
				<li class="list-group-item"><b>Inventory # :</b> {{ $inventory->inventory_id}} - 
				@if($inventory_list[$var]->inventory_id==$inventory->inventory_id)
					available

				{{--*/ $var ++ /*--}}

				@endif
				@foreach ($inventory->rentals->where('return_date',null) as $rental)
					<b>Rented By Customer :</b> {{ $rental->customer->getFullName() }}
					<a href="{{ url('rentals/'.$rental->rental_id.'/payment') }}" title="New Film" alt="New Film" class="btn btn-primary pull-right">
						Return Rental
					</a>
				@endforeach
				</li>
				
			@endforeach
		</ul>
		
		{{--
		@foreach ($inventory_list as $inventory_item)
			{{ $inventory_item->inventory_id }}
		@endforeach
		--}}

		
		{!! Form::open(['url'=>'inventories','class'=>'form-inline']) !!}
			{!! Form::hidden('film_id',$film->film_id) !!}
			{!! Form::hidden('store_id',Auth::user()->store_id) !!}
			
			{{-- <div class="input-group">
		      	<div class="input-group-addon">
		      		{{ $film->inventories->where('store_id',Auth::user()->store_id)->count() }}
		      	</div>
	      	</div> --}}
			{!! Form::submit('Add Inventory',['class'=>'btn btn-primary']) !!}			
			
		{!! Form::close() !!}
		

	</div>
	<div class="row">		
		<div class="col-md-8">
			<h3>Actors</h3>
			@if(count($film->actors))
				<ul class="list-group">
				@foreach ($film->actors as $actor)
					<li class="list-group-item"><a href="{{ action('ActorsController@show', $actor->actor_id) }}">{{ $actor->first_name }} {{ $actor->last_name }}</a></li>
				@endforeach
				</ul>
			@endif
		</div>
		<div class="col-md-4">
			<h3>Other</h3>
			<table class="table">							
				<tbody>
					<tr>
						<td>Release Year</td>
						<td>{{ $film->release_year }}</td>
					</tr>
					<tr>
						<td>Rental duration</td>
						<td>{{ $film->rental_duration }}</td>
					</tr>
					<tr>
						<td>Rental rate</td>
						<td>{{ $film->rental_rate }}</td>
					</tr>
					<tr>
						<td>Length</td>
						<td>{{ $film->length }}</td>
					</tr>
					<tr>
						<td>Replacement cost</td>
						<td>{{ $film->replacement_cost }}</td>
					</tr>
					<tr>
						<td>Rating</td>
						<td>{{ $film->rating }}</td>
					</tr>
					<tr>
						<td>Special features</td>
						<td>
						@if(count($film->special_features)) 				
							
								{{ implode(', ', $film->special_features) }} 
									
						@endif
						</td>
					</tr>
					<tr>
						<td>Language</td>
						<td>{{ $film->language{'name'} }}</td>
					</tr>
					<tr>
						<td>Original language</td>
						<td>{{ $film->originallanguage{'name'} }}</td>
					</tr>
				</tbody>
			</table>			
		</div>
	</div>

@stop