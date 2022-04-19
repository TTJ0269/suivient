@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liste Activité</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Liste Activité</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    

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
                                    <th scope="col">Déscription</th>
                                    <th scope="col">Lieu</th>
                                    <th scope="col">Date du début</th>
                                    <th scope="col">Date de fin</th>
                                    <th scope="col">Rapport</th>
                                </thead>

                                    <tbody>
                                    @foreach($activites as $key=>$activite)
                                    <tr>
                                    <th scope="row"> {{++$key}} </th>
                                    <th scope="row"> {{$activite->LibelleActivite}} </th>
                                    <th scope="row"> {{$activite->DescriptionActivite}} </th>
                                    <th scope="row"> {{$activite->LieuActivite}} </th>
                                    <th scope="row"> {{$activite->DateDebut}} </th>
                                    <th scope="row"> {{$activite->DateFin}} </th>
                                    <th scope="row"> {{$activite->LibelleRapport}} </th>
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
