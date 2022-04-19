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
   <!-- <a href="{{ route('rapports.create') }}" class="btn btn-primary my-3">Nouveau rapport</a> -->

    <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Liste des rapports</h3>
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
                                <table id="example1" class="table table-bordered table-striped">
                                  <hr>
                                <thead>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Libelle</th>
                                    <th scope="col">Administrateur ENT</th>
                                    <th scope="col">IFAD</th>
                                    @can('autorisationMoniteur','App\Models\User')
                                    <th scope="col">Action</th>
                                    @endcan
                                </thead>

                                    <tbody>
                                    @foreach($rapports as $key=>$rapport)
                                    <tr>
                                    <th scope="row"> {{++$key}} </th>
                                    <td> <a href="{{ route('rapports.show', ['rapport' => $rapport->id]) }}"> {{$rapport->LibelleRapport}} </a></td>
                                    <th scope="row"> {{$rapport->nomutilisateur}} {{$rapport->prenomutilisateur}}</th>
                                    <th scope="row"> {{ $rapport->LibelleIfad}} </th>
                                    @can('autorisationMoniteur','App\Models\User')
                                    <!-- envoie de l'id du rapport cela passe par activite_saisies.create ensuite activite_saisies.form-->
                                    <td> <a href="{{ route('activitesaisie', ['rapport_id' => $rapport->id]) }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i><span> Ajouter une activité </span></a> </td>
                                    @endcan
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
