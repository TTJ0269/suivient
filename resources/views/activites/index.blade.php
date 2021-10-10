@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Activité</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Activité</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <a href="{{ route('activites.create') }}" class="btn btn-primary my-3"><i class="fas fa-plus-circle"></i><span> Nouvelle activité </span></a>
    
    

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
                                    <th scope="col">Rapport</th>
                                    <th scope="col">Fichier</th>
                                </thead>

                                    <tbody>
                                    @foreach($activites as $key=>$activite)
                                    <tr>
                                    <th scope="row"> {{++$key}} </th>
                                    <td> <a href="{{ route('activites.show', ['activite' => $activite->id]) }}"> {{$activite->LibelleActivite}} </a></td>
                                    <th scope="row"> {{$activite->LibelleRapport}} </th>
                                    <th scope="row">
                                      <!-- envoie de l'id de l'activite cela passe par fichers.create ensuite fichers.form-->
                                      <form action="{{ route('ficher') }}" method="POST">
                                        @csrf
                                        <input type="number" hidden name="activite_id" value="{{ $activite->id }}">
                                        <input type="text" hidden name="LibelleActivite" value="{{ $activite->LibelleActivite }}">
                                        <button type="submit" class="btn btn-success"> <i class="nav-icon fas fa-file"></i> Joindre un fichier</button>
                                      </form>
                                    </th>
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
