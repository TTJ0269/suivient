@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Activité du rapport</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Activités du rapport</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">{{$activite_saisy->TitreActiviteSaisie}}</h3>
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
                            <a href="{{ route('activite_saisies.edit', ['activite_saisy' => $activite_saisy->id]) }}" class="btn btn-primary my-3"><i class="fas fa-edit"></i><span> Modifier </span></a>
                            <form action="{{ route('activite_saisies.destroy', ['activite_saisy' => $activite_saisy->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i><span> Supprimer </span></button>
                            </form>
                            <hr>
                            <p><strong>Dèscription de l'activité :</strong> {{$activite_saisy->DescriptionActiviteSaisie}}</p>
                              @foreach($fichers as $ficher)
                              <p><strong>Libelle du fichier :</strong> {{$ficher->libelleficher}}</p>
                                @if($ficher->urlficher)
                                <iframe src="{{ asset('storage/fichier/' .$ficher->urlficher) }}" frameborder="0" style="width: 600px; height: 400px;"></iframe>
                                @endif
                                <hr>
                              @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
