@extends('layouts.appwelcome')

@section('content')

<div class="hold-transition login-page">
<div class="login-box">


        
          <!--  @if (Route::has('login'))
                <div class="text-center">
                    @auth
                        <a href="{{ url('/index') }}" class="text-sm text-gray-700 underline">Accueille</a>
                    @else
                        <a href="{{ route('login') }}" class="breadcrumb-item">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="breadcrumb-item">Register</a>
                        @endif 
                    @endauth
                </div>
            @endif-->



  <div class="login-logo">
    <a href="#"><b>AED</b>-IFAD</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Bienvenue, connectez-vous</p>


      <form method="POST"  action="{{ route('login') }}">
          @csrf
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
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember_me" name="remember">
              <label for="remember_me">
                Se souvenir
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<!--
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
       /.social-auth-links -->
       @if (Route::has('password.request'))
      <p class="mb-1">
       <!-- <a href="{{ route('password.request') }}">Email ou mot de passe oublié ?</a> -->
      </p>
      @endif
      <!--p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</div>

@endsection
