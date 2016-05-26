@extends('templates.app')
@section('content')
	<h1>Edit Film</h1>

	<hr/>
	{!! Form::model($film,['action'=>['FilmsController@update',$film->film_id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
		
		@include('films._form',['submitButtonText' => 'Update Film'])


	{!! Form::close() !!}

	{{-- {!! Form::model($film,['action'=>['FilmsController@destroy',$film->film_id],'method'=>'DELETE','class'=>'form-horizontal']) !!}
		
		<div class="row">
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					{!! Form::submit('Delete',['class'=>'btn btn-primary form-control']) !!}			
				</div>
			</div>
		</div>

	{!! Form::close() !!} --}}

	@include('errors.list')

@stop