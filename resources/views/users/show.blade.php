@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Utilisateur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Utilisateur</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">{{$user->nomutilisateur}}</h3>
    <div class="card-tools">
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
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-primary my-3"><i class="fas fa-edit"></i><span> Modifier </span></a>
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger delete"><i class="fas fa-trash"></i><span> Supprimer </span></button>
                            </form>
                            <hr>
                            <p><strong>Nom :</strong> {{$user->nomutilisateur}}</p>
                            <p><strong>Prenom :</strong> {{$user->prenomutilisateur}}</p>
                            <p><strong>Email :</strong> {{$user->email}}</p>
                            <p>
                            <form action="{{ route('generationnewpassword') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="number" hidden  name="id" value="{{$user->id}}">
                            <input type="text" hidden  name="nomutilisateur" value="{{$user->nomutilisateur}}">
                            <input type="text" hidden  name="prenomutilisateur" value="{{$user->prenomutilisateur}}">
                            <input type="text" hidden  name="email" value="{{$user->email}}">
                            <button type="submit"  class="btn btn-success"><i class="fas fa-sync-alt"></i><span> Générer un nouveau mot de passe </span></button>
                            </form>
                            </p>
                            @can('view','App\Models\User')
                            <p>
                              <form action="{{ route('activecompte') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="number" hidden  name="id" value="{{$user->id}}">
                                <button type="submit"  class="btn btn-primary"><i class="fas fa-lock-open"></i><span> Activer compte </span></button>
                              </form>
                              <form action="{{ route('bloquercompte') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="number" hidden  name="id" value="{{$user->id}}">
                                <button type="submit"  class="btn btn-danger"><i class="fas fa-lock"></i><span> Bloquer compte </span></button>
                              </form>
                            </p>
                            @endcan
                            <p>
                            @if($user->imageutilisateur)
                            <img src="{{ asset('storage/image/' .$user->imageutilisateur) }}" alt="user-ImageUtilisateur" class="img-thumbnail" width="400">
                            @endif
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
