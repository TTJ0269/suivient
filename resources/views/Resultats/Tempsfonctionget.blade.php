@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Temps par fonction</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Temps par fonction</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title"> Information du temps consacré par fonction </h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-chart-line"></span>
    </div>
  </div>                              

                    <div class="card-body">
                                <table id="#" class="table table-bordered table-striped">
                                <thead>
                                    <th scope="col">Administrateur ENT</th>
                                    <th scope="col">Action</th>
                                </thead>

                                    <tbody>
                                    <tr>
                                        <form action="{{ route('temps_fonction') }}"  method="POST" enctype="multipart/form-data">
                                           @csrf
                                            <td scope="row"> 
                                                <select class="custom-select" name="user_id">
                                                @foreach($users as $key=>$user)
                                                <option value="{{ $user->id}}"> {{ $user->nomutilisateur }} {{ $user->prenomutilisateur }}</option>
                                                @endforeach
                                                </select>
                                            </td>
                                            <td scope="row">
                                              <div class="text-center">
                                                <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i></button>
                                              </div>
                                            </td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>

                     </div>
@endsection                         