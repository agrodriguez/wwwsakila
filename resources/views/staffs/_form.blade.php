	
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
					{!! Form::label('picture','Picture:',['class'=>'col-sm-2 control-label']) !!}

					<div class="col-sm-10">
						<div class="col-xs-6 col-md-3">
							<a href="#" class="thumbnail">
								<img src="data:image/png;base64,{!! base64_encode($picture) !!}" alt="Picture" id="pic" />
							</a>
						</div>
						<label for="picture" class="btn btn-default btn-file">
							Picture{!! Form::file('picture',['id'=>'imgInp']) !!}
						</label>
						<small class="text-danger">{{ $errors->first('picture') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('store_id') ? ' has-error' : '' }}">
					{!! Form::label('store_id','Store:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('store_id',$stores,null, ['class'=>'form-control','id'=>'store_id']) !!}
						<small class="text-danger">{{ $errors->first('store_id') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
					{!! Form::label('first_name','First Name:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('first_name',null,['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('first_name') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
				    {!! Form::label('last_name', 'Last Name:',['class'=>'col-sm-2 control-label']) !!}
				    <div class="col-sm-10">
					    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
					    <small class="text-danger">{{ $errors->first('last_name') }}</small>
				    </div>
				</div>

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					{!! Form::label('email','Email:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('email',null,['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('email') }}</small>
					</div>
				</div>

				
			 	<div class="form-group">
					<div class="checkbox col-sm-offset-2 col-sm-10 {{ $errors->has('active') ? ' has-error' : '' }}">
						<label for=active"">
							{!! Form::checkbox('active') !!}
							Active					
						</label>
						<small class="text-danger">{{ $errors->first('active') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
					{!! Form::label('username','User Name:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('username',null,['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('username') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					{!! Form::label('password','Password:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::password('password',null,['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('password') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					{!! Form::label('password_confirmation','Password confirmation:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::password('password_confirmation',null,['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
					</div>
				</div>

				

			</div>
		</div>

		<div class="row">
			<div class="col-md-5 col-md-offset-0">
				<div class="form-group{{ $errors->has('address.address') ? ' has-error' : '' }}">
					{!! Form::label('address','Address:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('address[address]',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('address.address') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('address.address2') ? ' has-error' : '' }}">
					{!! Form::label('address2','Address2:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('address[address2]',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('address.address2') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('address.district') ? ' has-error' : '' }}">
					{!! Form::label('district','District:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('address[district]',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('address.district') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
					{!! Form::label('country_id','Country:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('country_id',$countries,$cid, ['class'=>'form-control','id'=>'country_id']) !!}
						<small class="text-danger">{{ $errors->first('country_id') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
					{!! Form::label('city_id','City:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('city_id',$city,$ccid, ['class'=>'form-control', 'id'=>'city_id']) !!}
						<small class="text-danger">{{ $errors->first('city_id') }}</small>
					</div>
				</div>


				<div class="form-group{{ $errors->has('address.postal_code') ? ' has-error' : '' }}">
					{!! Form::label('postal_code','Postal code:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('address[postal_code]',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('address.postal_code') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('address.phone') ? ' has-error' : '' }}">
					{!! Form::label('phone','Phone:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('address[phone]',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('address.phone') }}</small>
					</div>
				</div>
				
			</div>
			<div class="col-md-7 ">
				<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
					{!! Form::label('location','Location:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::hidden('location',null) !!}
						<div id="map_div" style=" height:300px; border: 1px solid #d4d065;"></div>
						<small class="text-danger">{{ $errors->first('location') }}</small>
					</div>
				</div>
			</div>
		</div>

		

		<hr />
		<div class="row">
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-8">
					{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}			
				</div>
			</div>
		</div>

		@section('footer')

		<style type="text/css">
			    .btn-file {
			        position: relative;
			        overflow: hidden;
			    }
			    .btn-file input[type=file] {
			        position: absolute;
			        top: 0;
			        right: 0;
			        min-width: 100%;
			        min-height: 100%;
			        font-size: 100px;
			        text-align: right;
			        filter: alpha(opacity=0);
			        opacity: 0;
			        outline: none;
			        background: white;
			        cursor: inherit;
			        display: block;
			    }

		</style>
		
		<script type="text/javascript">
				
		var map;
		function initMap() {

			var latlng = new google.maps.LatLng({{ $loc }});


			map = new google.maps.Map(document.getElementById('map_div'), {
				center: latlng,
				zoom: 5
			});

			var marker = new google.maps.Marker({
				map: map,
				position: latlng,
				draggable: true
			});

			marker.addListener('dragend', function() {

				var point = marker.getPosition();
				map.panTo(point);
				//alert(point.lat().toFixed(5)+', '+point.lng().toFixed(5));
				document.getElementById("location").value =point.lat().toFixed(5)+', '+point.lng().toFixed(5) ;
			});


		}

		$(document).ready(function(){
			
			$("#country_id").select2();

			$("#store_id").select2();
		

			$("#city_id").select2({
				minimumInputLength: 0,
				ajax: {
					url: "/api/cities",
					dataType: 'json',
					data: function (term) {
						return {
							id:$("#country_id").val()
						};
					},
					processResults: function (data) {
						return { results: data };
					}
				}				
			});

		  	$("#country_id").on("change", function(e){ 
				$("#city_id").val(null).trigger("change");
			});

		    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
		        console.log(numFiles);
		        console.log(label);
		    });
		});
	    
	    $(document).on('change', '.btn-file :file', function() {
	        var input = $(this),
	            numFiles = input.get(0).files ? input.get(0).files.length : 1,
	            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	        input.trigger('fileselect', [numFiles, label]);
	    }); 

	    $("#imgInp").change(function(){
   			readURL(this);
		});

		function readURL(input) {
		    var url = input.value;
		    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
		    //if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
		    if (input.files && input.files[0]&& (ext == "png" || ext == "jpeg" || ext == "jpg")) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#pic').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }else{
		         $('#pic').attr('src', '/assets/no_preview.png');
		    }
		}

		</script>
		<script async defer
	    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf55wT2Bn6Juy0yBok2tSuGU3nuNluTgw&callback=initMap">
	    </script>

	@endsection
		{{-- 
		@section('footer')
			<script type="text/javascript">
			  $('#category_list,#actor_list,#special_features').select2();
			</script>
		@endsection
		--}}
