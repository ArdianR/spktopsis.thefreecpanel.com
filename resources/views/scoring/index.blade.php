@extends('layouts.menu')

@section('content')
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a><i class="fa fa-angle-right"></i>Perhitungan</li>
</ol>
<div class="agile-grids" id="print-container">
	<!-- tables -->
	<div class="agile-tables">
		<h3>Penilaian</h3>
		<table id="table-max-height" class="max-height">
			<thead>
				<tr>
					<th>No</th>
					<th>Alternatif</th>
					@foreach($criterias as $criteria)
						<th>{{ $criteria->name }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach($alternatives as $key => $alternative)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $alternative->name }}</td>
					@foreach($alternative->scores as $score)
						<td>{{ $score->score }}</td>
					@endforeach
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- //tables -->

	<!-- tables -->
	<div class="agile-tables">
		<h3>Pangkat</h3>
		<table id="table-max-height" class="max-height">
			<thead>
				<tr>
					<th>No</th>
					@foreach($criterias as $criteria)
						<th>{{ $criteria->name }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>#</td>
					@foreach($pangkats as $key => $pangkat)
						<td>{{ $pangkat }}</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
	<!-- //tables -->

	<!-- tables -->
	<div class="agile-tables">
		<h3>Normalisasi</h3>
		<table id="table-max-height" class="max-height">
			<thead>
				<tr>
					<th>No</th>
					<th>Alternatif</th>
					@foreach($criterias as $criteria)
						<th>{{ $criteria->name }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach($alternatives as $key => $alternative)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $alternative->name }}</td>
					@foreach($normalizations[$key] as $k => $normalization)
						<td>{{ $normalization }}</td>
					@endforeach
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- //tables -->

	<!-- tables -->
	<div class="agile-tables">
		<h3>Normalisasi Terbobot</h3>
		<table id="table-max-height" class="max-height">
			<thead>
				<tr>
					<th>No</th>
					<th>Alternatif</th>
					@foreach($criterias as $criteria)
						<th>{{ $criteria->name }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach($alternatives as $key => $alternative)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $alternative->name }}</td>
					@foreach($normalizationWeights[$key] as $k => $normalizationWeight)
					<td>{{ $normalizationWeight }}</td>
					@endforeach
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- //tables -->

	<!-- tables -->
	<div class="agile-tables">
		<h3>Solusi Ideal</h3>
		<table id="table-max-height" class="max-height">
			<thead>
				<tr>
					<th>No</th>
					@foreach($criterias as $criteria)
						<th>{{ $criteria->name }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>A+</td>
					@foreach($solusiPlus as $sPlus)
						<td>{{ $sPlus }}</td>
					@endforeach
				</tr>
				<tr>
					<td>A-</td>
					@foreach($solusiMinus as $sMinus)
						<td>{{ $sMinus }}</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
	<!-- //tables -->

	<!-- tables -->
	<div class="agile-tables">
		<h3>Hasil</h3>
		<table id="table-max-height" class="max-height">
			<thead>
				<tr>
					<th>Ranking</th>
					<th>Alternatif</th>
					<th>DI+</th>
					<th>DI-</th>
					<th>CI</th>
				</tr>
			</thead>
			<tbody>
				@php $no=1; @endphp
				@foreach($result as $key => $value)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $value['data'] }}</td>
					<td>{{ $value['dPlus'] }}</td>
					<td>{{ $value['dMinus'] }}</td>
					<td>{{ $value['v'] }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- //tables -->
</div>


<!--grid-->
<div class="validation-system">
	
	<div class="validation-form">
		<!---->
		<div class="col-md-12 form-group">
			{{-- <button onclick="document.getElementById('save-form').submit();" type="submit" class="btn btn-primary">Simpan</button> --}}
			<button id="print_result" type="submit" class="btn btn-primary">Print</button>
		</div>
		<div class="clearfix"> </div>
		<form id="save-form" action="{{ route('scoring.store') }}" method="POST" style="display: none;">
			@csrf
		</form>
		<!---->
	</div>
</div>
<!--//grid-->
<script src="{{ asset('assets/jspdf/dist/jspdf.min.js')}}"></script>
<script src="{{ asset('assets/js/jQuery.print.min.js')}}"></script>
<script>
    $(document).on('click', 'button#print_result', function (event) {
        $("div#print-container").print({
            globalStyles: true,
            mediaPrint: false,
            stylesheet: null,
            noPrintSelector: ".no-print",
            iframe: true,
            append: null,
            prepend: null,
            manuallyCopyFormValues: true,
            deferred: $.Deferred(),
            timeout: 750,
            title: null,
            doctype: '<!doctype html>'
        });
    });

    $(document).on('click', 'button#pdf_result', function (event) {
        var doc = new jsPDF('landscape');
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };
        doc.fromHTML($('#print-container').html(), 0, 0, {
            'width': 210,
            'elementHandlers': specialElementHandlers
        });
        doc.save('hasil.pdf');
    });

</script>
@endsection
