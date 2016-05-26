@extends('templates.app')
@section('content')
	<div class="panel-group">
		<table class="table">
			<caption>Staff <a href="{{ action('StaffsController@create') }}" title="New Staff" alt="New Staff"><span class="glyphicon glyphicon-plus-sign"></span></a></caption>
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
					<th>Picture</th>
					<th>Name</th>
					<th>Address</th>
					<th>email</th>
					<th>Store</th>
					<th>Active</th>	
					<th>&nbsp;</th>				
				</tr>
			</thead>
			<tfoot><tr><td colspan="7">{!! $staffs->links() !!}</td></tr></tfoot>
			<tbody>			
	@foreach ($staffs as $staff)
				<tr>
					<td>			
						<a href="{{ action('StaffsController@show', $staff->staff_id) }}" class="thumbnail">
							<img src="data:image/png;base64,{!! base64_encode($staff->picture) !!}" alt="Picture" />	
						</a>			
					</td>
					<td><a href="{{ action('StaffsController@show', $staff->staff_id) }}">{{ $staff->first_name }} {{ $staff->last_name }}</a></td>
					<td>{{ $staff->address->address }}, {{ $staff->address->getCity() }}, {{ $staff->address->getCountry() }}</td>
					<td>{{ $staff->email }}{{-- $staff->manages --}}</td>
					<td>{{ $staff->store->getStoreName() }}</td>
					<td><span class="glyphicon glyphicon-{{ $staff->active? 'ok': 'remove' }}" aria-hidden="true"></span></td>
					<td><a href="{{ action('StaffsController@edit', $staff->staff_id) }}" title="Edit Staff" alt="Edit Staff"><span class="glyphicon glyphicon-pencil"></span></a></td>					
				</tr>	
	@endforeach	
			</tbody>

		</table>
	</div>
@stop