@extends('layouts.menu')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
</ol>
<!--agileinfo-grap-->
<div class="agile3-grids">
    <div class="gallery-grid">
        <a class="example-image-link" href="images/admin.jpg" data-lightbox="example-set" data-title="">
            <img src="{{ asset('assets/images/g1.jpg') }}" alt="">
        </a>
    </div>
</div>
<!--//agileinfo-grap-->
@endsection
