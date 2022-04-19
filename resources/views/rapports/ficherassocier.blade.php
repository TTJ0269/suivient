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
              <li class="breadcrumb-item active">Ficher</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Ficher Associé</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="file" class="nav-icon fas fa-file"></span>
    </div>
  </div>
  <!-- /fin cadre -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">  
                        @forelse ($rapportfichers as $rapportficher)
                            <p><strong>Libelle de l'activité :</strong> {{$rapportficher->TitreActiviteSaisie}}</p>
                            <p><strong>Titre du fichier :</strong> {{$rapportficher->libelleficher}}</p>
                            @if($rapportficher->urlficher)
                            <iframe src="{{ asset('storage/fichier/' .$rapportficher->urlficher) }}" frameborder="0" style="width: 600px; height: 400px;"></iframe>    
                            @endif
                            <hr>
                        @empty
                           <div class="text-center">
                              <br>
                             <p> Aucun fichier joint </p>
                           </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection