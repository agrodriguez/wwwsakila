@extends('templates.app')
@section('content')
	<h1>Edit Address</h1>

	<hr/>
	{!! Form::model($address,['action'=>['AddressesController@update',$address->address_id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
		
		@include('addresses._form',['submitButtonText' => 'Update Address','cid'=>$address->city->country_id, 'ccid'=>$address->city_id])

	{!! Form::close() !!}

	@include('errors.list')

	

@stop