@extends('templates.app')
@section('content')
	<h1>Create New Film</h1>

	<hr/>

	{!! Form::open(['url'=>'inventories','class'=>'form-horizontal']) !!}
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				
				<div class="form-group{{ $errors->has('store_id') ? ' has-error' : '' }}">
					{!! Form::label('store_id','Store:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('store_id',$stores,null, ['class'=>'form-control','id'=>'store_id']) !!}
						<small class="text-danger">{{ $errors->first('store_id') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('film_id') ? ' has-error' : '' }}">
					{!! Form::label('film_id','Film:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('film_id',$films,null, ['class'=>'form-control','id'=>'film_id']) !!}
						<small class="text-danger">{{ $errors->first('film_id') }}</small>
					</div>
				</div>


			</div>
			

		</div>
		<hr />
		<div class="row">
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-8">
					{!! Form::submit('Add Inventory',['class'=>'btn btn-primary form-control']) !!}			
				</div>
			</div>
		</div>
		@section('footer')
		<script type="text/javascript">
			$(document).ready(function(){
			
				$("#film_id").select2();

				$("#store_id").select2();
			});
			
		</script>
		@endsection
	{!! Form::close() !!}

	@include('errors.list')	
@stop