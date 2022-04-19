@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">IFAD Moniteur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">IFAD Moniteur</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">IFAD Moniteur</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-school"></span> /
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
                    <form action="{{ route('ifad_moniteurs.update', ['ifad_moniteur' => $ifad_moniteur->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                        <button type="submit" class="btn btn-danger my-3">Fin de service</button>
                    </form>
                            <hr>
                            <p><strong>Date Début :</strong> {{$ifad_moniteur->datedebut}}</p>
                            <p><strong>Date Fin:</strong> {{$ifad_moniteur->datefin}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection