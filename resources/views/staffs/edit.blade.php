@extends('templates.app')
@section('content')
	<h1>Edit Staff</h1>

	<hr/>

	{!! Form::model($staff,['action'=>['StaffsController@update',$staff->staff_id],'method'=>'PATCH','class'=>'form-horizontal','files'=>true]) !!}
		
		@include('staffs._form',['submitButtonText' => 'Update Staff','cid'=>$staff->address->city->country_id, 'ccid'=>$staff->address->city_id,'loc'=>$staff->address->location,'picture'=>$staff->picture])


	{!! Form::close() !!}

	{{-- {!! Form::model($staff,['action'=>['StaffsController@destroy',$staff->staff_id],'method'=>'DELETE','class'=>'form-horizontal']) !!}
		
		<div class="row">
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-8">
					{!! Form::submit('Delete',['class'=>'btn btn-primary form-control']) !!}			
				</div>
			</div>
		</div>

	{!! Form::close() !!} --}}

	@include('errors.list')

@stop