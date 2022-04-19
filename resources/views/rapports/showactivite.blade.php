@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rapport</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Rapport</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 

        <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">{{$rapport->LibelleRapport}}</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-edit"></span>
    </div>
  </div>
  <!-- /fin cadre -->
  

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">  
                            <!--<form action="{{ route('rapports.destroy', ['rapport' => $rapport->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form> -->

                            <br>

                   <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <th scope="col">Numero</th>
                          <th scope="col">Activité</th>
                          <th scope="col">Dèscription</th>
                          <th scope="col">Fonction</th>
                          <th scope="col">Action</th>
                      </thead>

                          <tbody>
                          @forelse($fonctions as $key=>$activite)
                          <tr>
                          <th scope="row"> {{++$key}} </th>
                          <th scope="row"> {{$activite->TitreActiviteSaisie}}</th>
                          <th scope="row"> {{$activite->DescriptionActiviteSaisie}}</th>
                          <th scope="row"> {{$activite->LibelleFonction}} </th>
                          <th scope="row">
                                <form action="{{ route('rapport_ficher') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="number" hidden  name="activite_saisie_id" value="{{$activite->id}}"/> 
                                  <button type="submit" class="btn btn-primary my-1"><i class="fas fa-eye"></i><span> Fichier </span></button>
                                </form>
                                <!-- debut Ajouter un commentaire-->
                                @can('viewAny','App\Models\User')
                                <a href="{{ route('commentaire_create', ['activite_saisie_id' => $activite->id]) }}" class="btn btn-warning"> <i class="fas fa-comments"></i><span> Faire un commentaire </span> </a>
                                @endcan
                                <!-- fin Ajouter un commentaire-->
                          </th>
                          </tr>
                          @empty
                            <div class="text-center">
                              <p> Aucune activité enregistrée </p>
                            </div>
                          @endforelse
                          </tbody>
                  </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
