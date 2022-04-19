@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fichier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Fichier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">{{$ficher->libelleficher}}</h3>
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
                           <a href="/fichers/download/{{$ficher->urlficher}}" class="btn btn-primary my-3"> <i class="fas fa-download"></i><span> Télécharger </span> </a>
                          <!--  <a href="{{ route('fichers.edit', ['ficher' => $ficher->id]) }}" class="btn btn-primary my-3">Modifier</a> -->
                          @can('autorisationMoniteur','App\Models\User')
                            <form action="{{ route('fichers.destroy', ['ficher' => $ficher->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i><span> Supprimer </span></button>
                            </form>  
                          @endcan
                            <hr> 
                            <p><strong>Libelle :</strong> {{$ficher->libelleficher}}</p>
                            @if($ficher->urlficher)
                            <iframe src="{{ asset('storage/fichier/' .$ficher->urlficher) }}" frameborder="0" style="width: 600px; height: 400px;"></iframe>    
                            @endif
                            <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection