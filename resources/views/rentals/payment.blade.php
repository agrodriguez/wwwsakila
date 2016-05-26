@extends('templates.app')
@section('content')
	<h1>Payment</h1>
	
	<hr/>

	
	{!! Form::open(['class'=>'form-horizontal']) !!}
	{!! Form::hidden('store_id',Auth::user()->store_id ,['id'=>'store_id']) !!}
	{!! Form::hidden('staff_id',Auth::user()->staff_id ,['id'=>'staff_id']) !!}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
				{!! Form::label('amount','Amount:',['class'=>'col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					<div class="input-group">
						<div class="input-group-addon">$</div>
						{!! Form::text('amount',$amount[0]->amount,['class'=>'form-control']) !!}
					</div>
					<small class="text-danger">{{ $errors->first('amount') }}</small>
				</div>
			</div>

			
		</div>
	</div>
	<hr />
	<div class="row">
	
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					{!! Form::submit('Pay up!!',['class'=>'btn btn-primary pull-right']) !!}			
				</div>
			</div>
	</div>
	{!! Form::close() !!}
@stop




