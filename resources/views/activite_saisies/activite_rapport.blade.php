@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Activités des rapports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Activités des rapports</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


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
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Activité</th>
                                    <th scope="col">Dèscription</th>
                                    <th scope="col">Fonction</th>
                                </thead>

                                    <tbody>
                                    @forelse ( $fonctions as $key=>$fonction)
                                        <tr>
                                            <th scope="row"> {{++$key}} </th>
                                            <th scope="row"> {{$fonction->TitreActiviteSaisie}} </th>
                                            <th scope="row"> {{$fonction->DescriptionActiviteSaisie}} </th>
                                            <th scope="row"> {{$fonction->LibelleFonction}} </th>
                                        </tr>
                                    @empty
                                           <h4> Aucune activité associée</h4>
                                    @endforelse
                                    </tbody>
                                </table>
                     </div>
                </div>
            </div>
         </div>
     </div>
@endsection
