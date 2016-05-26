@extends('templates.app')
@section('content')
	<div class="panel-group">
		<table class="table">
			<caption>Customers <a href="{{ action('CustomersController@create') }}" title="New Customer" alt="New Customer"><span class="glyphicon glyphicon-plus-sign"></span></a></caption>
			<colgroup>
				<col>
				<col>
				<col>
				<col>
				<col>
				<col>
				<col>
			</colgroup>
			<thead>
				<tr>
					<th>Name</th>
					<th>Created</th>
					<th>Address</th>
					<th>email</th>
					<th>Store</th>
					<th>Active</th>	
					<th>&nbsp;</th>				
				</tr>
			</thead>
			<tfoot><tr><td colspan="7">{!! $customers->links() !!}</td></tr></tfoot>
			<tbody>			
	@foreach ($customers as $customer)
				<tr>
					<td><a href="{{ action('CustomersController@show', $customer->customer_id) }}">{{ $customer->first_name }} {{ $customer->last_name }}</a></td>
					<td>{{ $customer->create_date->diffForHumans() }}</td>
					<td>{{ $customer->address->address }}, {{ $customer->address->getCity() }}, {{ $customer->address->getCountry() }}</td>
					<td>{{ $customer->email }}</td>
					<td>{{ $customer->store->getStoreName() }}</td>
					<td><span class="glyphicon glyphicon-{{ $customer->active? 'ok': 'remove' }}" aria-hidden="true"></span></td>
					<td><a href="{{ action('CustomersController@edit', $customer->customer_id) }}" title="Edit Staff" alt="Edit Staff"><span class="glyphicon glyphicon-pencil"></span></a></td>					
				</tr>	
	@endforeach	
			</tbody>

		</table>
	</div>
@stop