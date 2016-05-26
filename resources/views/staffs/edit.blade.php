@extends('templates.app')
@section('content')
	<h1>Edit Staff</h1>

	<hr/>

	{!! Form::model($staff,['action'=>['StaffsController@update',$staff->staff_id],'method'=>'PATCH','class'=>'form-horizontal','files'=>true]) !!}
		
		@include('staffs._form',['submitButtonText' => 'Update Staff','cid'=>$staff->address->city->country_id, 'ccid'=>$staff->address->city_id,'loc'=>$staff->address->location,'picture'=>$staff->picture])


	{!! Form::close() !!}

	@include('errors.list')

@stop