@extends('templates.app')
@section('content')
	<div class="row">
		<h1>{{ $actor->first_name }} {{ $actor->last_name }}
		<span class="badge">{{ $actor->films->count() }} Films</span></h1>
	</div>
	<div class="row">
		<div class="col-md-3">
			<h3>Filmography</h3>
			@if(count($actor->films)) 
				<ul class="list-group">
				@foreach ($actor->films as $film)
					<li class="list-group-item"> <a href="{{ action('FilmsController@show', $film->film_id) }}">{{ $film->title }}</a></li>
				@endforeach
				</ul>
			@endif
		</div>
	</div>
@stop