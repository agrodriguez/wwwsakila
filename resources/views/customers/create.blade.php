@extends('templates.app')
@section('content')
	<h1>Create Customer</h1>
	<hr/>
	{!! Form::open(['url'=>'customers','class'=>'form-horizontal']) !!}

		@include('customers._form',['submitButtonText' => 'Add Customer','cid'=>null, 'ccid'=>null, 'loc'=>'0,0'])

	{!! Form::close() !!}

	
	@include('errors.list')

@stop