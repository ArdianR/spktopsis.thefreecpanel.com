@extends('layouts.menu')
@section('content')
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Penilaian <i class="fa fa-angle-right"></i> Tambah</li>
</ol>
<!--grid-->
<div class="validation-system">
	
	<div class="validation-form">
		<!---->
		
		<form action="{{ route('score.store') }}" method="post">
			@csrf			
			<div class="col-md-12 form-group2 group-mail">
				<label class="control-label">Nama Alternatif</label>
				<select name="alternative_id">
					<option >Pilih</option>
					@foreach($alternatives as $alternative)
						<option value="{{ $alternative->id }}">{{ $alternative->name }}</option>
					@endforeach
				</select>
			</div>
			@foreach($criterias as $key => $criteria)
				<div class="col-md-12 form-group1 group-mail">
					<label class="control-label">{{ $criteria->name }}</label>
					<input type="hidden" name="criteria_{{ $criteria->id }}" value="{{ $criteria->id }}">
					<input type="number" class="form-control" name="score_{{ $key }}" placeholder="Nilai" required>
					@if($errors->has("score_$key"))
						<p class="alert alert-warning">{{ $errors->first("score_$key") }}</p>
					@endif
				</div>
			@endforeach
			<div class="clearfix"> </div>
			
			<div class="col-md-12 form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
				<button type="reset" class="btn btn-default">Reset</button>
			</div>
			<div class="clearfix"> </div>
		</form>
		
		<!---->
	</div>
</div>
@endsection