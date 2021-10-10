@extends('layouts.appwelcome')

@section('content')
      <!-- cadre general -->
  <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h2 class="text-center">AED-IFAD</h2>
    </div>
  </div>
  <!-- /fin cadre -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="text-center">

                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <h3>Vous êtes connectés</h3>
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Accéder</a>
                            @else
                                <h3>Bienvenue, pour accéder à la plateforme veuillez-vous connecter</h3>
                                <a href="{{ route('login') }}" class="breadcrumb-item">Se Connecter</a>

                              <!-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="breadcrumb-item">Register</a>
                                @endif  -->
                            @endauth
                        </div>
                    @endif
              </div>
           </div><!-- /.col -->
        </div>
      </div>
   </div>
@endsection
