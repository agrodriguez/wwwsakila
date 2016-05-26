		<div class="row">
			<div class="col-md-5 col-md-offset-0">
				<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
					{!! Form::label('address','Address:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('address',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('address') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
					{!! Form::label('address2','Address2:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('address2',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('address2') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
					{!! Form::label('district','District:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('district',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('district') }}</small>
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

				<div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
					{!! Form::label('postal_code','Postal code:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('postal_code',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('postal_code') }}</small>
					</div>
				</div>

				<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
					{!! Form::label('phone','Phone:',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('phone',null, ['class'=>'form-control']) !!}
						<small class="text-danger">{{ $errors->first('phone') }}</small>
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
		<div class="row">
		
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}			
					</div>
				</div>
			
		</div>
		
		@section('footer')
		<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
      type="text/javascript"></script>

		<script type="text/javascript">
		loadMap({{ $address->location }})

		function loadMap(long, lat) {
			if (GBrowserIsCompatible()) {
				var map = new GMap2(document.getElementById("map_div"));
				map.addControl(new GSmallMapControl());
				map.addControl(new GMapTypeControl());
				var center = new GLatLng(lat, long);
				map.setCenter(center, 5);
				geocoder = new GClientGeocoder();
				var marker = new GMarker(center, {
					draggable: true
				});
				map.addOverlay(marker);
				document.getElementById("location").value = center.lng().toFixed(5)+', '+center.lat().toFixed(5);
				GEvent.addListener(marker, "dragend", function() {
					var point = marker.getPoint();
					map.panTo(point);
					document.getElementById("location").value = point.lng().toFixed(5)+', '+point.lat().toFixed(5);
				});
			}
		}

		$(document).ready(function(){
			
			$("#country_id").select2();
		

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
		}); 
		</script>

	@endsection

