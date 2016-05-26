@extends('templates.app')
@section('content')
	
    
	<div class="panel-group">
		
				<table class="table">
					<caption>Addresses <a href="{{ action('AddressesController@create') }}" title="New Address" alt="New Address"><span class="glyphicon glyphicon-plus-sign"></span></a></caption>
					<colgroup>
						<col>
						<col>
						<col>
						<col>
					</colgroup>
					<thead>
						<tr>
							<th>Name</th>
							<th>&nbsp;</th>	
							<th>&nbsp;</th>
							<th>&nbsp;</th>		
						</tr>
					</thead>
					<tfoot><tr><td colspan="4">{!! $addresses->links() !!}</td></tr></tfoot>
					<tbody>
					@foreach ($addresses as $address)

						<tr>
							<td><a href="{{ action('AddressesController@show', $address->address_id) }}">{{ $address->address }} {{ $address->address2 }}</a>
							<td></td>
							</td>
							<td><a href="{{ action('AddressesController@edit', $address->address_id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
							<td>{{ $address->location }}</td>
						</tr>
					@endforeach	
					</tbody>
				</table>
				
					
	</div>

@stop