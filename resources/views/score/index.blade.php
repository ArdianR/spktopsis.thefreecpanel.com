@extends('layouts.menu')
@section('content')
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Score</li>
</ol>
<div class="agile-grids">
	<!-- tables -->
	
	<div class="agile-tables">
		<h3>Score</h3>
		<table id="table-max-height" class="max-height">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					@foreach($criterias as $criteria)
						<th>{{ $criteria->name }}</th>
					@endforeach
                    <th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($alternatives as $key => $alternative)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $alternative->name }}</td>
					@foreach($alternative->scores as $score)
						<td>{{ $score->score }}</td>
					@endforeach
                    <td>
                    	<a onclick="document.getElementById('delete-form').submit();">Delete</a>
                    </td>
                    <form id="delete-form" action="{{ route('score.destroy', $alternative->id) }}" method="POST">
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