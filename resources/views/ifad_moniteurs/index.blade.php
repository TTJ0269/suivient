@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">IFAD Moniteur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">IFAD Moniteur</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <a href="{{ route('ifad_moniteurs.create') }}" class="btn btn-primary my-3"><i class="fas fa-plus-circle"></i><span> Nouveau IFAD Moniteur </span></a>  

    <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Listes</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-school"></span> /
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-user"></span>
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
                                    <th scope="col">IFAD</th>
                                    <th scope="col">Utilisateur</th>
                                    <th scope="col">Date Début</th>
                                    <th scope="col">Date Fin</th>
                                </thead>

                                    <tbody>
                                    @foreach($ifad_moniteurs as $key=>$ifad_moniteur)
                                    <tr>
                                    <th scope="row"> {{++$key}} </th>
                                    <th scope="row"> {{ $ifad_moniteur->ifad->LibelleIfad}} </th>
                                    <td> <a href="{{ route('ifad_moniteurs.show', ['ifad_moniteur' => $ifad_moniteur->id]) }}"> {{$ifad_moniteur->user->nomutilisateur}} {{$ifad_moniteur->user->prenomutilisateur}} ({{$ifad_moniteur->user->type_utilisateur->libelletype}})</a></td>
                                    <th scope="row"> {{$ifad_moniteur->datedebut}} </th>
                                    <th scope="row"> {{$ifad_moniteur->datefin}} </th>
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