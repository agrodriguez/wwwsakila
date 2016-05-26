@extends('templates.app')
@section('content')
	<h1>Edit Film</h1>

	<hr/>
	{!! Form::model($film,['action'=>['FilmsController@update',$film->film_id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
		
		@include('films._form',['submitButtonText' => 'Update Film'])


	{!! Form::close() !!}

	@include('errors.list')

@stop