@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Evaluation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Evaluation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <a href="{{ route('evaluations.create') }}" class="btn btn-primary my-3"><i class="fas fa-plus-circle"></i><span> Nouvelle Evaluation </span></a>

    <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Liste des evaluations</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-crop-alt"></span>
    </div>
  </div>
  <!-- /fin cadre -->
    
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">


               <!-- <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Line Chart</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                      </div> -->

                    <div class="card-body">
                      <hr>
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Libelle</th>
                                    <th scope="col">Valeur</th>
                                    <th scope="col">Type evaluation</th>
                                </thead>

                                    <tbody>
                                    @foreach($evaluations as $key=>$evaluation)
                                    <tr>
                                    <th scope="row"> {{++$key}} </th>
                                    <td> <a href="{{ route('evaluations.show', ['evaluation' => $evaluation->id]) }}"> {{$evaluation->LibelleEval}} </a></td>
                                    <th scope="row"> {{$evaluation->valeur}} </th>
                                    <th scope="row"> {{$evaluation->LibelleEvaluation}} </th>
                                  </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                     </div>
                  </div>
                </div>
            </div>
         </div>
     </div>
@endsection
