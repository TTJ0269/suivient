@extends('layouts.appselection')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Statistiques</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Statistiques</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                      <br>   
  <div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Statistique par Livret de positionnement</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>       
     <div class="card-body"> 
     <div class="container-fluid">                  
                    <form action="{{ route('positionnement') }}"  method="POST" enctype="multipart/form-data">
                    @csrf


                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Utilisateur</label>
                          <div class="col-sm-10">
                              <div class="input-group mb-3">
                                  <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                    <select class="form-select form-select-lg" name="user_id" id="user">
                                        <option selected disabled>Sélectionner l'utilisateur</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->nomutilisateur }} {{ $user->prenomutilisateur }}</option>
                                        @endforeach
                                    </select>
                              </div>
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Livret de positionnement</label>
                          <div class="col-sm-10">
                              <div class="input-group mb-3">
                                  <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                                  </div>
                                      <select class="form-select form-select-lg" name="livret_id" id="livret"></select>
                              </div>
                          </div>
                      </div>
                
                      <div class="text-center">
                        <button type="submit" class="btn btn-success my-2"> <i class="fas fa-check"></i> Valider</button>
                      </div>

                  </form>
     </div>
    </div>
 </div>
                  <br>
                  @include('statistiques.mois_index')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection                         