@extends('layouts.menu')
@section('content')
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Criteria</li>
</ol>
<div class="agile-grids">
	<!-- tables -->
	
	<div class="agile-tables">
		<h3>Criteria</h3>
		<table id="table-max-height" class="max-height">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Weight</th>
                    <th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($criterias as $criteria)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $criteria->name }}</td>
					<td>{{ $criteria->weight }}</td>
                    <td>
                    	<a href="{{ route('criteria.edit',$criteria->id) }}">Edit</a></br>
                    	<a onclick="document.getElementById('delete-form').submit();">Delete</a>
                    </td>
                    <form id="delete-form" action="{{ route('criteria.destroy', $criteria->id) }}" method="POST">
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