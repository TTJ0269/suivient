@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Activités des rapports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Activités des rapports</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!--<a href="{{ route('activite_saisies.create') }}" class="btn btn-primary my-3"><i class="fas fa-plus-circle"></i><span> Nouvelle activité </span></a>-->

<div class="card card-info collapsed-card">
    <div class="card-header">
        <h3 class="card-title">Nouvelle activité</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
     <div class="card-body">
     <div class="container-fluid">
        <form action="{{ route('activite_saisies_create_rapport') }}"  method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group row">
                  <label for="text" class="col-sm-2 col-form-label">Semaine du mois</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="semaine_rapport" id="semaine_rapport">
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

    <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Liste des activités</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-paste"></span>
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
                                    <th scope="col">Numero</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Fonction</th>
                                    <th scope="col">Rapport</th>
                                    <th scope="col">Action_Joindre_fichier</th>
                                </thead>

                                    <tbody>
                                    @foreach($activite_saisies as $key=>$activite_saisy)
                                    <tr>
                                    <th scope="row"> {{++$key}} </th>
                                    <td> <a href="{{ route('activite_saisies.show', ['activite_saisy' => $activite_saisy->id]) }}"> {{$activite_saisy->TitreActiviteSaisie}} </a></td>
                                    <th scope="row"> {{$activite_saisy->LibelleFonction}} </th>
                                    <th scope="row"> <a href="{{ route('activite_rapport', ['id_rapport' => $activite_saisy->id_rapport]) }}"> {{$activite_saisy->LibelleRapport}} </a> </th>
                                       <!-- envoie de l'id de l'activite cela passe par fichers.create ensuite fichers.form-->
                                    <td> <a href="{{ route('fichier', ['activite_saisy' => $activite_saisy->id]) }}" class="btn btn-success"> <i class="fas fa-file"></i><span> Joindre un fichier </span> </a></td>
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
