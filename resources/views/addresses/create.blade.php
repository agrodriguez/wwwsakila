@extends('templates.app')
@section('content')
	<h1>Create Address</h1>

	<hr/>
	{!! Form::open(['url'=>'addresses','class'=>'form-horizontal']) !!}

		@include('addresses._form',['submitButtonText' => 'Add Address','cid'=>null, 'ccid'=>null])

	{!! Form::close() !!}

	
	@include('errors.list')

@stop