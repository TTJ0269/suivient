<div class="hold-transition login-page">
<div class="login-box">



  <div class="login-logo">
    <a href="#"><b>AED</b>-IFAD</a>
  </div>
          @if (session()->has('messagealert'))
          <div class="alert alert-danger" role="alert">
          {{ session()->get('messagealert') }}
          </div>
          @endif
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Bienvenue, Veuillez changer votre mot de passe</p>


      <form method="POST"  action="{{ route('passwordchangementpost') }}">
          @csrf
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control" placeholder="nouveau mot de passe" name="password" :value="old('password')" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
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
        <div class="row">
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
  </div>
</div>

</div>