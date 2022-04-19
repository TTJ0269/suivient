@extends('layouts.appwelcome')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<title>AED</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('login-template-dixhuit/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login-template-dixhuit/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<form class="login100-form validate-form" method="POST"  action="{{ route('login') }}">
               @csrf
			    <div class="text-center">
                  <img src="{{ asset('storage/imageifad/aedsuivi.png') }}" class="img elevation" style="width: 250px; height: 100px;" alt="AED Image">
               </div>
			   <div class="text-center">
				@if (session()->has('message')) 
				<div class="btn btn-success btn-block" role="alert">
				{{ session()->get('message') }}
				</div>
				@endif

				@if (session()->has('messagealert'))
				<div class="alert alert-danger" role="alert">
				{{ session()->get('messagealert') }}
				</div>
				@endif
			   </div>
			   <p class="login-box-msg"></p>
					<p class="login-box-msg"> Bienvenue, sur notre plateforme de suivi des administrateurs-animateurs
					de l'Espace Numérique de Travail. </p>
					<p class="login-box-msg"> Pour y accéder veuillez-vous connecter. </p>

					  @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 sm:block">
                            @auth
							<div class="text-center">
                                <h3>Vous êtes connecté</h3>
								<br>
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline"><h1 style="color:SteelBlue">Accéder</h1></a>
								</div>
                            @else
                                <!--<h3>Bienvenue, pour accéder à la plateforme veuillez-vous connecter</h3>
                                <a href="{{ route('login') }}" class="breadcrumb-item">Se Connecter</a>-->
								

							<div class="input-group mb-3">
							<input id="email" type="email" class="form-control" placeholder="Email" name="email" :value="old('email')" required autofocus>
							<div class="input-group-append">
								<div class="input-group-text">
								<span class="fas fa-envelope"></span>
								</div>
							</div>
							</div>

							<div class="input-group mb-3">
							<input id="password" type="password" class="form-control" placeholder="Mot de passe" type="password" name="password" required autocomplete="current-password">
							<div class="input-group-append">
								<div class="input-group-text">
								<span class="fas fa-lock"></span>
								</div>
							</div>
							</div>
					

							<div class="container-login100-form-btn">
								<button class="login100-form-btn">
									Se connecter
								</button>
							</div>

                            @endauth
                        </div>
                    @endif
					
					
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							Allons-y
						</span>
					</div>
  
				</form>

				<div class="login100-more" style="background-image: url('login-template-dixhuit/images/code.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="{{ asset('login-template-dixhuit/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login-template-dixhuit/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login-template-dixhuit/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('login-template-dixhuit/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login-template-dixhuit/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login-template-dixhuit/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('login-template-dixhuit/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login-template-dixhuit/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login-template-dixhuit/js/main.js') }}"></script>

</body>
</html>

@endsection
