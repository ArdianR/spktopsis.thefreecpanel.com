<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Home :: w3layouts</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" type="text/css"/>
		<!-- Graph CSS -->
		<link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
		<!-- jQuery -->
		<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
		<!-- //jQuery -->
		<!-- tables -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/table-style.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/basictable.css') }}" />
		<script type="text/javascript" src="{{ asset('assets/js/jquery.basictable.min.js') }}"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('#table-max-height').basictable({
				tableWrapper: true
			});
		});
		</script>
		<!-- //tables -->
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<!-- lined-icons -->
		<link rel="stylesheet" href="{{ asset('assets/css/icon-font.min.css') }}" type='text/css' />
		<!-- //lined-icons -->
	</head>
	<body>
		<div class="page-container">
			<!--/content-inner-->
			<div class="left-content">
				<div class="mother-grid-inner">
					<!--header start here-->
					<div class="header-main">
						<div class="logo-w3-agile">
							<h1><a href="{{ url('/') }}">Pooled</a></h1>
						</div>
						<div class="profile_details w3l">
							<ul>
								<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<div class="profile_img">
											<span class="prfil-img"><img src="{{ asset('assets/images/in4.jpg') }}" alt=""> </span>
											<div class="user-name" style="justify-content: center;">
												<span>Administrator</span>
											</div>
											<i class="fa fa-angle-down"></i>
											<i class="fa fa-angle-up"></i>
											<div class="clearfix"></div>
										</div>
									</a>
									<ul class="dropdown-menu drp-mnu">
										<li> <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a> </li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</ul>
								</li>
							</ul>
						</div>
						
						<div class="clearfix"> </div>
					</div>
					<!--heder end here-->
					
					@yield('content')
					<!-- script-for sticky-nav -->
					<script>
					$(document).ready(function() {
						var navoffeset=$(".header-main").offset().top;
						$(window).scroll(function(){
							var scrollpos=$(window).scrollTop();
							if(scrollpos >=navoffeset){
								$(".header-main").addClass("fixed");
							}else{
								$(".header-main").removeClass("fixed");
							}
						});
						
					});
					</script>
					<!-- /script-for sticky-nav -->
					<!--inner block start here-->
					<div class="inner-block">
					</div>
					<!--inner block end here-->
					<!--copy rights start here-->
					<div class="copyrights">
						<p>© 2016 Pooled. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
					</div>
					<!--COPY rights end here-->
				</div>
			</div>
			<!--//content-inner-->
			<!--/sidebar-menu-->
			<div class="sidebar-menu">
				<header class="logo1">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
				</header>
				<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
				<div class="menu">
					<ul id="menu" >
						<li><a href="index.html"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
						<li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Criteria</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
						<ul id="menu-academico-sub" >
							<li id="menu-academico-avaliacoes" ><a href="{{ route('criteria.create') }}">Tambah Criteria</a></li>
							<li id="menu-academico-avaliacoes" ><a href="{{ route('criteria.index') }}">List Criteria</a></li>
						</ul>
					</li>
					<li id="menu-academico" ><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span> Alternatives</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
					<ul id="menu-academico-sub" >
						<li id="menu-academico-avaliacoes" ><a href="{{ route('alternative.create') }}">Tambah Alternative</a></li>
						<li id="menu-academico-avaliacoes" ><a href="{{ route('alternative.index') }}">List Alternative</a></li>
					</ul>
					<li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i><span> Penilaian</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
					<ul id="menu-academico-sub" >
						<li id="menu-academico-avaliacoes" ><a href="{{ route('score.create') }}">Tambah Penilaian</a></li>
						<li id="menu-academico-avaliacoes" ><a href="{{ route('score.index') }}">List Penilaian</a></li>
					</ul>
				</li>
				<li><a href="{{ route('scoring.index')}}"><i class="fa fa-table"></i>  <span>Perhitungan</span><div class="clearfix"></div></a></li>
				{{-- <li><a href=""><i class="fa fa-check-square-o nav_icon" aria-hidden="true"></i>  <span>Laporan</span><div class="clearfix"></div></a></li> --}}
			</ul>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<script>
var toggle = true;
			
$(".sidebar-icon").click(function() {
if (toggle)
{
	$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
	$("#menu span").css({"position":"absolute"});
}
else
{
	$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
	setTimeout(function() {
	$("#menu span").css({"position":"relative"});
	}, 400);
}
				
				toggle = !toggle;
			});
</script>
<!--js -->
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- /Bootstrap Core JavaScript -->
<!-- morris JavaScript -->
<script src="{{ asset('assets/js/raphael-min.js') }}"></script>
<script src="{{ asset('assets/js/morris.js') }}"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	jQuery('.small-graph-box').hover(function() {
		jQuery(this).find('.box-button').fadeIn('fast');
	}, function() {
		jQuery(this).find('.box-button').fadeOut('fast');
	});
	jQuery('.small-graph-box .box-close').click(function() {
		jQuery(this).closest('.small-graph-box').fadeOut(200);
		return false;
	});
	
	//CHARTS
	function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
			behaveLikeLine: true,
			gridEnabled: false,
			gridLineColor: '#dddddd',
			axes: true,
			resize: true,
			smooth:true,
			pointSize: 0,
			lineWidth: 0,
			fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
			redraw: true,
			ykeys: ['iphone', 'ipad', 'itouch'],
			labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	
	});
</script>
</body>
</html>