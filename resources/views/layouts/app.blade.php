<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Hotel Dashboard Template</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
	<link rel="stylehseet" href="h{{asset('ttps://cdn.oesmith.co.uk/morris-0.5.1.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> </head>

<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="{{route('home')}}" class="logo"> <img src="{{asset('assets/img/hotel_logo.png')}}" width="50" height="70" alt="logo"> <span class="logoclass">Payment Gateways</span> </a>
				<a href="index.html" class="logo logo-small"> <img src="{{asset('assets/img/hotel_logo.png')}}" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
		</div>
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="active"> <a href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
						<li class="list-divider"></li>
						<li class="active"> <a href="{{route('stkpush')}}"><i class="fas fa-tachometer-alt"></i> <span> Mpesa</span></a> </li>
            <li class="active"> <a href="index.html"><i class="fas fa-tachometer-alt"></i> <span> Paypal</span></a> </li>
					</ul>
				</div>
			</div>
		</div>

  @yield('content')

</div>
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/js/chart.morris.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
@include('layouts.scripts')
</body>

</html>