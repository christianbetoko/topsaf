<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        <!-- Meta Tag -->
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name='copyright' content='top-saf'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Site Title -->
		
		
		<!-- Fav Icon -->
		<link rel="icon" type="image/x-icon" href="{{asset('assets/img/logo.png')}}">
		
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,800;1,900&display=swap" rel="stylesheet">   
		
		<!-- Theme Stylesheet -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/cube-portfolio.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/maginific-popup.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/animate-text.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
		
		<!-- Theme Default CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

		@if(View::hasSection('meta_tags'))
        @yield('meta_tags')
    @else
        {{-- Valeurs par défaut (ex: Accueil) --}}
        <meta property="og:title" content="TOP SANTÉ FUKANG">
        <meta property="og:description" content="Formations et services de santé à FUKANG.">
        <meta property="og:image" content="{{asset('assets/img/logo.png')}}">
        <meta name="twitter:image" content="{{asset('assets/img/logo.png')}}">
    @endif
         @livewireStyles
    </head>
    <body>
<livewire:components.header />
        {{ $slot }}

<livewire:components.footer />

        <!-- Jquery Plugin JS -->
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('assets/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
		<script src="{{asset('assets/js/modernizer.min.js')}}"></script>
		<script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
		<script src="{{asset('assets/js/cube-portfolio.min.js')}}"></script>
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('assets/js/wow.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery-fancybox.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
		<script src="{{asset('assets/js/steller.min.js')}}"></script>
		<script src="{{asset('assets/js/easing.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
		<script src="{{asset('assets/js/main.js')}}"></script>
		<!-- End Jquery Plugin JS -->
         @livewireScripts
    </body>
</html>
