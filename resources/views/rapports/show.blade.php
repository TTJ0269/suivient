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
                            <br>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Livret de positionnement</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">

                    <div class="row">
                      <div class="col-12 col-sm-8">
                        <div class="form-group">
                            <h6><strong> Administrateur-Animateur ENT : {{$rapport->ifad_moniteur->user->nomutilisateur}} {{$rapport->ifad_moniteur->user->prenomutilisateur}} </strong></h6>
                        </div>
                      </div>

                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <div class="form-group clearfix">
                              <h6><strong> (0) Non observé </strong></h6>
                              <h6><strong> (1) L'activité a été observée </strong></h6>
                              <h6><strong> (2) L'activité a été réalisée avec de l'aide </strong></h6>
                              <h6><strong> (3) L'activité a été réalisée en toute autonomie </strong></h6>
                              <h6><strong> (4) L'activité a été réalisée et maîtrisée </strong></h6>
                          </div>
                        </div>
                      </div>
                    </div>

                    <table id="example1" class="table table-bordered table-striped">
                       <br>
                        <thead>
                            <th scope="col">Numero</th>
                            <th scope="col">Type d'activité</th>
                            <th scope="col">Activité et positionnement</th>
                            <th scope="col">Temps</th>
                        </thead>

                            <tbody>
                            @foreach ($collections as $key=>$collection)
                            <tr>
                            <th scope="row"> {{++$key}} </th>
                            <th scope="row"> {{ $collection[0]}}</th>
                            <th scope="row">
                              @foreach  ($collection[1] as $acitivite_positionnement)
                                      {{$acitivite_positionnement->LibelleActivite}} __
                                      "{{$acitivite_positionnement->ValeurPost}}".
                                      <hr>
                              @endforeach
                            </th>
                            <th scope="row"> {{ $collection[2]}} min</th>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
             </div>
                            <br>

                                                 <!-- debut cadre-->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Activité par fonction</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <th scope="col">Numero</th>
                          <th scope="col">Activité</th>
                          <th scope="col">Dèscription</th>
                          <th scope="col">Fonction</th>
                          <th scope="col">Action</th>
                      </thead>

                          <tbody>
                          @forelse($fonctions as $key=>$activite)
                          <tr>
                          <th scope="row"> {{++$key}} </th>
                          <th scope="row"> {{$activite->TitreActiviteSaisie}}</th>
                          <th scope="row"> {{$activite->DescriptionActiviteSaisie}}</th>
                          <th scope="row"> {{$activite->LibelleFonction}} </th>
                          <th scope="row">
                                <form action="{{ route('rapport_ficher') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="number" hidden  name="activite_saisie_id" value="{{$activite->id}}"/>
                                  <button type="submit" class="btn btn-primary my-1"><i class="fas fa-eye"></i><span> Fichier </span></button>
                                </form>
                                <!-- debut Ajouter un commentaire-->
                                @can('viewAny','App\Models\User')
                                <a href="{{ route('commentaire_create', ['activite_saisie_id' => $activite->id]) }}" class="btn btn-warning"> <i class="fas fa-comments"></i><span> Faire un commentaire </span> </a>
                                @endcan
                                <!-- fin Ajouter un commentaire-->
                          </th>
                          </tr>
                          @empty
                            <div class="text-center">
                              <p> Aucune activité enregistré </p>
                            </div>
                          @endforelse
                          </tbody>
                  </table>
               </div>
            </div>
                          <!-- fin cadre-->

                        <div>
                        @can('viewAny','App\Models\User')
                            <form action="{{ route('rapports.update', ['rapport' => $rapport->id]) }}" method="POST" enctype="multipart/form-data">
                               @csrf
                               @method('PATCH')
                               <div class="text-center">
                                <button type="submit" class="btn btn-success my-3"><i class="fas fa-check-circle"></i><span> Valider le rapport </span></button>
                              </div>
                           </form>
                        @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
