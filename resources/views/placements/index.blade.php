 @extends('layouts.app')

 @section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Evaluation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Evaluation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="card card-info collapsed-card">
    <div class="card-header">
        <h3 class="card-title">Nouvelle évaluation</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
     <div class="card-body">
     <div class="container-fluid">
        <form action="{{ route('placement_create_user') }}"  method="POST" enctype="multipart/form-data">
        @csrf
                  <div class="col-sm-12">
                    <div class="content">
                          <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Administrateur ENT</label>
                              <div class="col-sm-10">
                                  <div class="input-group mb-3">
                                      <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                      </div>
                                        <select class="custom-select" name="user_id" id="user">
                                            <option selected disabled>Sélectionner Administrateur ENT</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->nomutilisateur }} {{ $user->prenomutilisateur }}</option>
                                            @endforeach
                                        </select>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="col-sm-12">
                            <div class="content">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Date à évaluation</label>
                                            <div class="col-sm-10">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                    <input type="date" class="form-control  @error('date') is-invalid @enderror" name="date" id="date">
                                                    @error('date')
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('date')}}
                                                    </div>
                                                    @enderror
                                            </div>
                                           </div>
                                     </div>
                                </div>
                            </div>

            <div class="text-center">
               <button class="btn btn-primary my-3"> Suivant <i class="fas fa-angle-right"></i></button>
            </div>

        </form>
    </div>
    </div>
</div>

    <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Liste des évaluations</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-school"></span>
    </div>
  </div>
  <!-- /fin cadre -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <hr>
                        <thead>
                            <th>Numéro</th>
                            <th>Date d'évaluation</th>
                            <th>Administrateur ENT</th>
                        </thead>

                            <tbody>
                              @foreach($placements as $key=>$placement)
                              <tr>
                              <th scope="row"> {{++$key}} </th>
                              <td> <a href="{{ route('placement_show', ['placement_ifad_moniteur' => $placement->ifad_moniteur_id ,'placement_date' => $placement->DateEnregistrement ]) }}"> {{$placement->DateEnregistrement}} </a></td>
                              <th scope="row"> {{$placement->nomutilisateur}} {{$placement->prenomutilisateur}} </th>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                     </div>
                </div>
            </div>
         </div>
     </div>
@endsection
