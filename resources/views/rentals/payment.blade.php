@extends('templates.app')
@section('content')
	<h1>Payment</h1>
	
	<hr/>

	

	{!! Form::open(['class'=>'form-horizontal']) !!}
	{!! Form::text('ammount',$ammount[0]->ammount,['class'=>'form-control']) !!}
	{!! Form::hidden('store_id',Auth::user()->store_id ,['id'=>'store_id']) !!}
	{!! Form::hidden('staff_id',Auth::user()->staff_id ,['id'=>'staff_id']) !!}
	<div class="row">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				{!! Form::submit('Pay up!!',['class'=>'btn btn-primary form-control']) !!}			
			</div>
		</div>
	</div>
@stop




