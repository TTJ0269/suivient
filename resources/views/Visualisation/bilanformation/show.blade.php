@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bilan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Bilan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Bilan</h3>
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
                        @foreach($showformations as $showformation)  
                            <p><strong>Titre :</strong> {{$showformation->LibelleActivite}}</p>
                            <p><strong>Déscription :</strong> {{$showformation->DescriptionActivite}}</p>
                            <p><strong>Lieu :</strong> {{$showformation->LieuActivite}}</p>
                            <p><strong>Date du Début :</strong> {{$showformation->DateDebut}}</p>
                            <p><strong>Date de Fin :</strong> {{$showformation->DateFin}}</p>
                            <div>
                              <form action="{{ route('rapport_ficher') }}" method="POST" enctype="multipart/form-data">
                               <input type="number" hidden  name="activite_id" value="{{$showformation->id}}"/> 
                                @csrf
                                <button type="submit" class="btn btn-primary my-3"><i class="fas fa-eye"></i><span> Voir fichier associé </span></button>
                              </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
