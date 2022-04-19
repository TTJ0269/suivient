@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Livret de positionnement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Livret de positionnement</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

       <div class="row">
            <div class="col-12 col-sm-8">
              <div class="form-group">
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
         @if ($rapport_id == 0)
         <a href="{{ route('livret_positionnements.edit', ['livret_positionnement' => $livret_positionnement->id]) }}" class="btn btn-primary my-2"><i class="far fa-edit"></i>Modifier</a>
         @endif
         <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
      @foreach($users as $user)
       <h4 class="card-title">{{$livret_positionnement->LibelleLivret}} de {{$user->nomutilisateur}} {{$user->prenomutilisateur}} ({{$user->LibelleIfad}})</h4>
      @endforeach
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-book-open"></span>
    </div>
  </div>
  <!-- /fin cadre -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                            <!--<form action="{{ route('livret_positionnements.destroy', ['livret_positionnement' => $livret_positionnement->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form> -->
                            <table id="#" class="table table-bordered table-striped">
                                  <hr>
                                <thead>
                                    <th scope="col">Numéro</th>
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
                                            <table id="#" class="table table-bordered table-hover">
                                              <thead>
                                                  <th scope="col"><a href="#">Activité </a></th>
                                                  <th scope="col"><a href="#">Position </a></th>
                                              </thead>

                                              <tbody>
                                                 @foreach ($collection[1] as $activite_positionnement)
                                                  <tr>
                                                    <th scope="row"> {{$activite_positionnement->LibelleActivite}} </th>
                                                    <th scope="row">
                                                      <div class="col-12">
                                                        {{$activite_positionnement->ValeurPost}}
                                                        @can('autorisationMoniteur','App\Models\User')
                                                          @if ($rapport_id == 0)
                                                            <a href="{{ route('positionnements.edit', ['positionnement' => $activite_positionnement->id]) }}"> <i class="fas fa-pen"></i><span></span> </a>
                                                          @endif
                                                        @endcan
                                                        @can('viewAny','App\Models\User')
                                                          @if ($rapport_id == 0)
                                                            <a href="{{ route('positionnements.edit', ['positionnement' => $activite_positionnement->id]) }}"> <i class="fas fa-pen"></i><span></span> </a>
                                                          @endif
                                                        @endcan
                                                      </div>
                                                    </th>
                                                  </tr>
                                                  @endforeach
                                              </tbody>
                                           </table>
                                    </th>
                                    <th scope="row"> {{ $collection[2]}} min
                                        <div class="col-12">
                                          @can('autorisationMoniteur','App\Models\User')
                                            @if ($rapport_id == 0)
                                              <a href="{{ route('temps_types.edit', ['temps_type' => $collection[3]]) }}"> <i class="fas fa-pen"></i><span></span> </a>
                                            @endif
                                          @endcan
                                          @can('viewAny','App\Models\User')
                                            @if ($rapport_id == 0)
                                              <a href="{{ route('temps_types.edit', ['temps_type' => $collection[3]]) }}"> <i class="fas fa-pen"></i><span></span> </a>
                                            @endif
                                          @endcan
                                        </div>
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
      <hr>
    <div class="text-center">
      <div class="row no-print">
          <div class="col-12">
            <button onclick="window.print()" class="btn btn-success"><i class="far fa-credit-card"></i> Imprimer</button>
          </div>
      </div>
    </div>

@endsection
