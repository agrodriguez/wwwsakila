@extends('templates.app')
@section('content')
	<div class="panel-group">
		<h3>Films <a href="{{ action('FilmsController@create') }}" title="New Film" alt="New Film"><span class="glyphicon glyphicon-plus-sign"></span></a></H3>
		<ul class="listasgrid" id="quad">
	@foreach ($films as $film)
			<li>

					
					<a href="{{ action('FilmsController@show', $film->film_id) }}">{{ $film->title }}</a>:
					{{ $film->description }}
					<p>
					@foreach ($film->categories as $category)
						<span class="label label-primary">{{ $category->name }}</span>
					@endforeach
					
					<a href="{{ action('FilmsController@edit', $film->film_id) }}" title="Edit Film" alt="Edit Film" style="float:right"><span class="glyphicon glyphicon-pencil"></span></a>
					<!--small>{{-- $film->last_update->diffForHumans() --}}</small--></p>
			</li>	
	@endforeach	
		</ul>
		{!! $films->links() !!}
	</div>
@stop