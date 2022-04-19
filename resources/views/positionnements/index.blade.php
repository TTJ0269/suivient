 @extends('layouts.app')
 
 @section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Positionnement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Positionnement</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Positionnement</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-signal"></span>
    </div>
  </div>
  <!-- /fin cadre -->
    
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                         <br>
                        <div class="text-center">
                         <strong> <a href="#"> Se positionner par rapport aux fonctions de l'Administrateur Animateur ENT</a> </strong>
                        </div>
                         <br>

                         <form action="{{ route('semaine_livret_create') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                          <div class="form-group row">
                              <label for="text" class="col-sm-2 col-form-label">Semaine du mois</label>
                              <div class="col-sm-10">
                                  <select class="form-control" name="semaine_livret" id="semaine_livret">
                                      @foreach ($semaines as $semaine)
                                        <option value="{{$semaine}}"> {{$semaine}} </option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>             
                        <div class="text-center">
                           <button class="btn btn-primary my-3"> Suivant <i class="fas fa-angle-right"></i></button>
                        </div>
                      </form>  

                     </div>
                </div>
            </div>
         </div>
     </div>
@endsection