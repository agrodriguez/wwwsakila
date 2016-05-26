@extends('templates.app')
@section('content')

	<div class="panel-group">
		
				<table class="table">
					<caption>Actors</caption>
					<colgroup>
						<col>
						<col>
						<col>
					</colgroup>
					<thead>
						<tr>
							<th>Name</th>
							<th>&nbsp;</th>	
							<th>&nbsp;</th>		
						</tr>
					</thead>
					<tfoot><tr><td colspan="3">{!! $actors->links() !!}</td></tr></tfoot>
					<tbody>
					@foreach ($actors as $actor)

						<tr>
							<td><a href="{{ action('ActorsController@show', $actor->actor_id) }}">{{ $actor->first_name }} {{ $actor->last_name }}</a>
							<td><span class="badge">{{ $actor->films->count() }} Films</span></td>
							</td>
							<td>{{-- <a href="{{ action('ArticlesController@edit', $actor->id) }}"><span class="glyphicon glyphicon-pencil"></span></a> --}}</td>
						</tr>
					@endforeach	
					</tbody>
				</table>
				
					{{-- @foreach ($actor->films as $film)
						<div class="body">{{ $film->title }}</div>
					@endforeach --}}
					
	</div>

@stop