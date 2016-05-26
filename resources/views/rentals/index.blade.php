@extends('templates.app')
@section('content')
	<h1>Rent a film</h1>

	<hr/>

	{!! Form::open(['url'=>'rentals','class'=>'form-horizontal']) !!}
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				
				<div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
					{!! Form::label('customer_id','Customer:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('customer_id',$customers,null, ['class'=>'form-control','id'=>'customer_id']) !!}
						<small class="text-danger">{{ $errors->first('customer_id') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('film_id') ? ' has-error' : '' }}">
					{!! Form::label('film_id','Film:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('film_id',$films,null, ['class'=>'form-control','id'=>'film_id']) !!}
						<small class="text-danger">{{ $errors->first('film_id') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('inventory_id') ? ' has-error' : '' }}">
					{!! Form::label('inventory_id','Inventory:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('inventory_id',[],null, ['class'=>'form-control', 'id'=>'inventory_id']) !!}
						<small class="text-danger">{{ $errors->first('inventory_id') }}</small>
					</div>
				</div>

				{!! Form::hidden('store_id',Auth::user()->store_id ,['id'=>'store_id']) !!}
				{!! Form::hidden('staff_id',Auth::user()->staff_id ,['id'=>'staff_id']) !!}


			</div>
			

		</div>
		<hr />
		<div class="row">
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-8">
					{!! Form::submit('Add rental',['class'=>'btn btn-primary pull-right']) !!}			
				</div>
			</div>
		</div>
		@section('footer')
		<script type="text/javascript">
			$(document).ready(function(){
			
				$("#film_id").select2();

				$("#customer_id").select2();

				$("#inventory_id").select2({
					minimumInputLength: 0,
					ajax: {
						url: "/api/inventories",
						dataType: 'json',
						data: function (term) {
							return {
								id:$("#film_id").val(),
								store:$("#store_id").val(),
							};
						},
						processResults: function (data) {
							return { results: data };
						}
					}				
				});
			});
			
		</script>
		@endsection
	{!! Form::close() !!}

	@include('errors.list')	
@stop




