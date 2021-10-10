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
                       @foreach($activites as $key=>$activite)
                            <p class="text-center"><strong>Activité :</strong> {{++$key}}</p> 
                            <p><strong>Titre :</strong> {{$activite->LibelleActivite}}</p> 
                            <p><strong>Dèscription :</strong> {{$activite->DescriptionActivite}}</p>
                            <p><strong>Lieu :</strong> {{$activite->LieuActivite}}</p>
                            <p><strong>Date Début :</strong> {{$activite->DateDebut}}</p>
                            <p><strong>Date Fin :</strong> {{$activite->DateFin}}</p>
                            <hr>   
                            <div>
                              <form action="{{ route('rapport_ficher') }}" method="POST" enctype="multipart/form-data">
                               <input type="number" hidden  name="activite_id" value="{{$activite->id}}"/> 
                                @csrf
                                <button type="submit" class="btn btn-primary my-3"><i class="fas fa-eye"></i><span> Voir fichier associé </span></button>
                              </form>
                            </div>

                           
                            <!-- debut Ajouter un commentaire-->
                            @can('viewAny','App\Models\User')
                            @include('commentaires.create')
                            @endcan
                            <!-- fin Ajouter un commentaire-->
                            <hr>
                       @endforeach
                        <div>
                        @can('viewAny','App\Models\User')
                            <form action="{{ route('rapports.update', ['rapport' => $rapport->id]) }}" method="POST" enctype="multipart/form-data">
                               @csrf
                               @method('PATCH')
                              <button type="submit" class="btn btn-success my-3"><i class="fas fa-check-circle"></i><span> Valider le rapport </span></button>
                           </form>
                        @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
