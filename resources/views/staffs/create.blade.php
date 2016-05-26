@extends('templates.app')
@section('content')
	<h1>Create New Staff</h1>

	<hr/>

	{!! Form::open(['url'=>'staffs','class'=>'form-horizontal','files'=>true]) !!}
		
		@include('staffs._form',['submitButtonText' => 'Add Staff','cid'=>null, 'ccid'=>null, 'loc'=>'0,0','picture'=>null])

	{!! Form::close() !!}

	@include('errors.list')	
@stop