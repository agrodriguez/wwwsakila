@extends('templates.app')
@section('content')
	<h1>Edit Customer</h1>

	<hr/>
	{!! Form::model($customer,['action'=>['CustomersController@update',$customer->customer_id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
		
		@include('customers._form',['submitButtonText' => 'Update Customer','cid'=>$customer->address->city->country_id, 'ccid'=>$customer->address->city_id,'loc'=>$customer->address->location])

		

	{!! Form::close() !!}

	@include('errors.list')
@stop