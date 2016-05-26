	
	
		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			{!! Form::label('title','Name:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('title',null,['class'=>'form-control']) !!}
				<small class="text-danger">{{ $errors->first('title') }}</small>
			</div>
		</div>

		<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
		    {!! Form::label('description', 'Description:',['class'=>'col-sm-2 control-label']) !!}
		    <div class="col-sm-10">
			    {!! Form::textarea('description', null, ['class' => 'form-control','size' => '30x4']) !!}
			    <small class="text-danger">{{ $errors->first('description') }}</small>
		    </div>
		</div>


		<div class="form-group{{ $errors->has('category_list') ? ' has-error' : '' }}">
			{!! Form::label('category_list','Categories:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('category_list[]',$categories,null, ['id'=>'category_list', 'class'=>'form-control','multiple']) !!}
				<small class="text-danger">{{ $errors->first('category_list') }}</small>
			</div>
		</div>

		<div class="form-group{{ $errors->has('actor_list') ? ' has-error' : '' }}">
			{!! Form::label('actor_list','Actors:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('actor_list[]',$actors,null, ['id'=>'actor_list', 'class'=>'form-control','multiple']) !!}
				<small class="text-danger">{{ $errors->first('actor_list') }}</small>
			</div>
		</div>

		<div class="form-group{{ $errors->has('release_year') ? ' has-error' : '' }}">
			{!! Form::label('release_year','Release Year:',['class'=>'col-sm-2 control-label']) !!}
			
			{{-- Carbon::now()->year --}}
			<div class="col-sm-10">
				{!! Form::selectYear('release_year',1920,2020,2016,['class'=>'form-control']) !!}
				<small class="text-danger">{{ $errors->first('release_year') }}</small>
			</div>
		</div>

		<div class="form-group{{ $errors->has('language_id') ? ' has-error' : '' }}">
			{!! Form::label('language_id','Language:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('language_id',$languages,null, ['class'=>'form-control']) !!}
				<small class="text-danger">{{ $errors->first('language_id') }}</small>
			</div>
		</div>

		<div class="form-group{{ $errors->has('original_language_id') ? ' has-error' : '' }}">
			{!! Form::label('original_language_id','Original language:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('original_language_id',$languages,null, ['class'=>'form-control']) !!}
				<small class="text-danger">{{ $errors->first('original_language_id') }}</small>
			</div>
		</div>

		<div class="form-group{{ $errors->has('rental_duration') ? ' has-error' : '' }}">
			{!! Form::label('rental_duration','Rental duration:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				<div class="input-group">
					<div class="input-group-addon">days</div>
					{!! Form::text('rental_duration',null,['class'=>'form-control']) !!}
				</div>
				<small class="text-danger">{{ $errors->first('rental_duration') }}</small>
				
			</div>
		</div>

		<div class="form-group{{ $errors->has('rental_rate') ? ' has-error' : '' }}">
			{!! Form::label('rental_rate','Rental rate:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				<div class="input-group">
					<div class="input-group-addon">$</div>
					{!! Form::text('rental_rate',null,['class'=>'form-control']) !!}
				</div>
				<small class="text-danger">{{ $errors->first('rental_rate') }}</small>
			</div>
		</div>

		<div class="form-group{{ $errors->has('length') ? ' has-error' : '' }}">
			{!! Form::label('length','Length:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				<div class="input-group">
					<div class="input-group-addon">mins.</div>
					{!! Form::text('length',null,['class'=>'form-control']) !!}
				</div>
				<small class="text-danger">{{ $errors->first('length') }}</small>
			</div>
		</div>

		<div class="form-group{{ $errors->has('replacement_cost') ? ' has-error' : '' }}">
			{!! Form::label('replacement_cost','Replacement cost:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				<div class="input-group">
					<div class="input-group-addon">$</div>
					{!! Form::text('replacement_cost',null,['class'=>'form-control']) !!}
				</div>
				<small class="text-danger">{{ $errors->first('replacement_cost') }}</small>
			</div>
		</div>
		

		<div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
			{!! Form::label('rating','Rating:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('rating',$ratings,null,['class'=>'form-control']) !!}
				<small class="text-danger">{{ $errors->first('rating') }}</small>
			</div>
		</div>

		<div class="form-group{{ $errors->has('special_features') ? ' has-error' : '' }}">
			{!! Form::label('special_features','Special features:',['class'=>'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('special_features[]',$specialFeatures,null,['id'=>'special_features','class'=>'form-control','multiple']) !!}
				<small class="text-danger">{{ $errors->first('special_features') }}</small>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}			
			</div>
		</div>

		@section('footer')
			<script type="text/javascript">
			  $('#category_list,#actor_list,#special_features').select2();
			</script>
		@endsection
