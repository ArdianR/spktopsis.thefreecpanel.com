@extends('layouts.menu')
@section('content')
<!--heder end here-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a><i class="fa fa-angle-right"></i>Alternative <i class="fa fa-angle-right"></i> Tambah</li>
</ol>
<!--grid-->
<div class="validation-system">
	
	<div class="validation-form">
		<!---->
		
		<form action="{{ route('alternative.store') }}" method="post">
			@csrf			
			<div class="col-md-12 form-group1 group-mail">
				<label class="control-label">Name</label>
				<input type="text" class="form-control" name="name" placeholder="Nama" required>
				@if($errors->has('name'))
					<p class="alert alert-warning">{{ $errors->first('name') }}</p>
				@endif
			</div>
			<div class="col-md-12 form-group1 group-mail">
				<label class="control-label">Phone Number</label>
				<input type="number" class="form-control" name="phone_number" placeholder="Nilai Bobot" required>
				@if($errors->has('phone_number'))
					<p class="alert alert-warning">{{ $errors->first('phone_number') }}</p>
				@endif
			</div>
			<div class="col-md-12 form-group1 group-mail">
				<label class="control-label">Alamat</label>
				<textarea type="textarea" class="form-control" name="address" placeholder="Alamat" required></textarea>
				@if($errors->has('address'))
					<p class="alert alert-warning">{{ $errors->first('address') }}</p>
				@endif
			</div>
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