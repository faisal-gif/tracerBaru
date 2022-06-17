<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tracer Study</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	
	<link rel="stylesheet" href="{{asset('hom/css/animate.css')}}">

	<link rel="stylesheet" href="{{asset('hom/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('hom/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('hom/css/magnific-popup.css')}}">

	<link rel="stylesheet" href="{{asset('hom/css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('hom/css/jquery.timepicker.css')}}">
	<link rel="shortcut icon" href="{{asset('images/logo_jti.png')}}" />
	
	<link rel="stylesheet" href="{{asset('hom/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('hom/css/style.css')}}">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html"><span>Tracer</span>Study</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item {{ request()->segment(1) == '/' ? 'active' : '' }}"><a href="/" class="nav-link">Home</a></li>
					<li class="nav-item {{ (request()->segment(1) == 'about') ? 'active' : '' }}"><a href="/about" class="nav-link">Tentang Kami</a></li>
					<li class="nav-item {{ request()->segment(1) == 'testimoni' ? 'active' : '' }}"><a href="/testimoni" class="nav-link">Alumni</a></li>
					<li class="nav-item {{ request()->segment(1) == 'kabarr' ? 'active' : '' }}"><a href="/kabarr" class="nav-link">Artikel</a></li>
					<li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
				</ul>
			  </div>
		</div>
	</nav>
<!-- </form> -->
	<!-- END nav -->
	
	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/polinema.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>About <i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread">About Tracer Study</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">	
			<div class="row">
			@yield('content')
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<footer class="ftco-footer ftco-no-pt">
		<div class="container">
		  <div class="row mb-5">
			<div class="col-md pt-5">
			  <div class="block-23 mb-3">
				<ul class="ftco-footer-social list-unstyled float-md-left float-lft">
				  <li><span class="icon fa fa-map-marker"></span><span class="text">Jurusan Teknologi Informasi
					Gedung Teknik Sipil lt. 5-8 - Politeknik Negeri Malang
					Jl. Soekarno Hatta No. 9 Malang 65141</span></li>
				</ul>
			  </div>
			</div>
			<div class="col-md pt-5">
			  <div class="block-23 mb-3">
				<ul class="list-unstyled">
				  <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+62 (0341) 404424 – 404425</span></a></li>
				</ul>
			  </div>
			</div>
			<div class="col-md pt-5">
			  <div class="block-23 mb-3">
				<ul class="list-unstyled">
				  <li><a href="#"><span class="icon fa fa-fax"></span><span
					class="text"> +62 (0341) 404420</span></a></li>
				</ul>
			  </div>
			</div>
			<div class="col-md pt-5">
				<div class="block-23 mb-3">
				  <ul>
					<li><a href="#"><span class="icon fa fa-envelope"></span><span
						  class="text">jti@polinema.ac.id</span></a></li>
				  </ul>
				</div>
			  </div>
		  </div>
		  <div class="row">
			<div class="col-md-12 text-center">
	
			  <p>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;
				<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with
				<i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
				  target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			  </p>
			</div>
		  </div>
		</div>
	  </footer>

		<script src="{{asset('hom/js/jquery.min.js')}}"></script>
		<script src="{{asset('hom/js/jquery-migrate-3.0.1.min.js')}}"></script>
		<script src="{{asset('hom/js/popper.min.js')}}"></script>
		<script src="{{asset('hom/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('hom/js/jquery.easing.1.3.js')}}"></script>
		<script src="{{asset('hom/js/jquery.waypoints.min.js')}}"></script>
		<script src="{{asset('hom/js/jquery.stellar.min.js')}}"></script>
		<script src="{{asset('hom/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('hom/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('hom/js/jquery.animateNumber.min.js')}}"></script>
		<script src="{{asset('hom/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('hom/js/scrollax.min.js')}}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="{{asset('hom/js/google-map.js')}}"></script>
		<script src="{{asset('hom/js/main.js')}}"></script>
		
	</body>
	</html>