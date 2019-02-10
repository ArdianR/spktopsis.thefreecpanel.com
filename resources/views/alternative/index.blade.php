@extends('layouts.menu')
@section('content')
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a><i class="fa fa-angle-right"></i>Alternative</li>
</ol>
<div class="agile-grids">
	<!-- tables -->
	
	<div class="agile-tables">
		<h3>Alternative</h3>
		<table id="table-max-height" class="max-height">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Alamat</th>
                    <th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($alternatives as $alternative)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $alternative->name }}</td>
					<td>{{ $alternative->phone_number }}</td>
					<td>{{ $alternative->address }}</td>
                    <td>
                    	<a href="{{ route('alternative.edit',$alternative->id) }}">Edit</a></br>
                    	<a onclick="document.getElementById('delete-form').submit();">Delete</a>
                    </td>
                    <form id="delete-form" action="{{ route('alternative.destroy', $alternative->id) }}" method="POST">
                    	@csrf
                    	@method('DELETE')
                    </form>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- //tables -->
</div>
@endsection