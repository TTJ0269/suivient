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
       <form class="login100-form validate-form" method="POST"  action="{{ route('passwordchangementpost') }}">
          @csrf
				<div class="text-center">
                  <img src="{{ asset('storage/imageifad/aedsuivi.png') }}" class="img elevation" style="width: 250px; height: 100px;" alt="User Image">
               </div>
			   <p class="login-box-msg"></p>
					<p class="login-box-msg"> Bienvenue, Veuillez changer votre mot de passe. </p>
					
					<div class="input-group mb-3">
          <input id="password" type="password" class="form-control" placeholder="nouveau mot de passe" name="password" :value="old('password')" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input id="confirmationpassword" type="password" class="form-control" placeholder="Confirmation" name="confirmationpassword" required autofocus>
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
