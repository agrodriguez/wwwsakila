@extends('templates.app')
@section('content')
	<h1>Create New Film</h1>

	<hr/>

	{!! Form::open(['url'=>'films','class'=>'form-horizontal']) !!}
		
		@include('films._form',['submitButtonText' => 'Add Film'])

	{!! Form::close() !!}

	@include('errors.list')	
@stop