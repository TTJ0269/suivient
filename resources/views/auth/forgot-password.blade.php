@extends('layouts.appwelcome')

@section('content')
<div class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>AED-</b>IFDA</a>
  </div>
        <!-- Validation Errors -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">
          Vous avez oublié votre mot de passe ? Ici, vous pouvez facilement récupérer un nouveau mot de passe.
        </p>

        <form action="{{ route('generationnewpassword') }}" method="POST" style="display: inline;">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Demander un nouveau mot de passe</button>
          </div>
        </div>
       </form> 
       </div>
   </div>
</div>
</div>
       
@endsection