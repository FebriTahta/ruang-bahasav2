<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-focus">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name','Ruang Bahasa') }}</title>
        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

    {{-- <title>Course Academy</title> --}}

    <link href="//fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('assets/assets/css/style-starter.css') }}">
	
	@yield('head')
	
  </head>
  <body>
<!-- header -->
<header class="w3l-header text-white" style="background-color: #5A67D8">
	<div class="container" >
	<!--/nav-->
	<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-sm-3 px-0">
			<a class="navbar-brand text-white" href="/" >
				<span class="fa fa-newspaper-o text-white"></span> Ruang Bahasa</a>
			<!-- if logo is image enable this   
						<a class="navbar-brand" href="#index.html">
							<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
						</a> -->

			
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<!-- <span class="navbar-toggler-icon"></span> -->
				<span class="fa icon-expand fa-bars"></span>
				<span class="fa icon-close fa-times"></span>
			</button>

			<div class="collapse navbar-collapse" style="background-color: #5A67D8" id="navbarSupportedContent">
				<nav class="mx-auto">
					
				</nav>
				<ul class="navbar-nav" >
					{{-- <li class="nav-item active">
						<a class="nav-link" href="index.html">Home</a>
					</li> --}}
					<li class="nav-item dropdown @@pages__active">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Menu <span class="fa fa-angle-down text-white"></span>
						</a>
						<div class="dropdown-menu" style="background-color: #5A67D8" aria-labelledby="navbarDropdown">
							{{-- <a class="dropdown-item @@fa__active" onclick="news()">News</a> --}}
							<a class="dropdown-item @@b__active text-white" href="{{ route('forums') }}">Forum Diskusi</a>
							<a class="dropdown-item @@fa__active text-white" href="{{ route('allinstruktur') }}">Daftar Guru</a>
							<a class="dropdown-item @@fa__active text-white" href="{{ route('allkursus') }}">Daftar Kelas</a>
							<a class="dropdown-item @@fa__active text-white" href="{{ route('about') }}">Tentang Kami </a>
						</div>
					</li>					
					@auth
						<li class="nav-item @@contact__active ">
							@if (auth()->user()->role==='admin')
							<a class="nav-link  text-white" href="{{ route('dashboard') }}">Papan Instrumen</a>
															
							@elseif(auth()->user()->role==='instruktur')
								<a class="nav-link  text-white" href="{{ route('home') }}">Papan Instrumen</a>
																
							@elseif(auth()->user()->role==='siswa')
								<a class="nav-link  text-white" href="{{ route('home') }}">Papan Instrumen</a>
								
							@endif
						</li>
					@else
						<li class="nav-item @@pages__active">
							<a class="nav-link  text-white" href="{{ route('login') }}">Masuk</a>
						</li>
						<li class="nav-item @@pages__active">
							<a class="nav-link  text-white" href="{{ route('register') }}">Daftar</a>
						</li>
					@endauth
					<li class="nav-item ">
						@auth
							@if (auth()->user()->role==='admin')
							<a class="nav-link  text-white" href="{{ route('logout') }}">Keluar</a>
																
							@elseif(auth()->user()->role==='instruktur')
							<a class="nav-link  text-white" href="{{ route('logout') }}">Keluar</a>
							
							@elseif(auth()->user()->role==='siswa')
							<a class="nav-link  text-white" href="{{ route('logout') }}">Keluar</a>
							
							@elseif(auth()->user()->role==='pengunjung')
							<a class="nav-link  text-white" href="{{ route('logout') }}">Keluar</a>
							@endif	
						@endauth
					</li>
				</ul>
			</div>
			<!-- toggle switch for light and dark theme -->
			<div class="mobile-position">
				<nav class="navigation">
					<div class="theme-switch-wrapper">
						@auth
						@if (auth()->user()->role=='instruktur')
						<?php 
							  $notif = App\Notifurai::where('user_id', auth()->user()->id)->where('dinilai',0)->get();
						
						?>
							<div class="theme-switch" for="checkbox">
								<div class="mode-container" style="width: 20px; margin-right: 10px">
									<a href="{{ route('formreset') }}" class="fa fa-bell fa-lg text-white">{{ count($notif) }}</a>
								</div>
							</div>
						@endif
						@endauth
						{{-- <label class="theme-switch" for="checkbox" style="margin-left: 15px">
							<input type="checkbox" id="checkbox">
							<div class="mode-container">
								<i class="gg-sun"></i>
								<i class="gg-moon"></i>
							</div>
						</label> --}}
					</div>					
				</nav>
			</div>
			<!-- //toggle switch for light and dark theme -->
		</div>
	</nav>
	<!--//nav-->
</header>
<!-- //header -->

