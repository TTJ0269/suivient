@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Commentaire</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Commentaire</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Commentaire</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="comments" class="nav-icon fas fa-comments"></span>
    </div>
  </div>
  <!-- /fin cadre -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">  
                          <!--  <a href="{{ route('commentaires.edit', ['commentaire' => $commentaire->id]) }}" class="btn btn-primary my-3">Modifier</a>
                            <form action="{{ route('commentaires.destroy', ['commentaire' => $commentaire->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form> 
                            <hr>-->
                            <p><strong>Libelle :</strong> {{$commentaire->DescriptionCommentaire}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection