@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bilan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Bilan formation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- cadre general -->
<div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title"> Information du bilan </h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-user"></span> /
      <span data-toggle="tooltip" title="file" class="nav-icon fas fa-copy"></span>
    </div>
  </div>
  <!-- /fin cadre -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                <hr>
                <!-- debut cadre-->
                <div class="card card-success collapsed-card">
                     <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chalkboard-teacher"></i> Formation Générale </h3>  
                       <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                       </div>
                     </div>
                 

                       <div class="card-body">
                         <div class=text-center>
                           <a href="{{ route('bilangeneral') }}" class="btn btn-primary my-3"><span> Bilan general </span></a>
                         </div>
                      </div>
                  </div>
                          <!-- fin cadre-->

                          <hr>
                <!-- debut cadre-->
                <div class="card card-primary collapsed-card">
                     <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chalkboard-teacher"></i> Formation Précise </h3>  
                       <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                       </div>
                     </div>
                 

                       <div class="card-body">
                                <table id="#" class="table table-bordered table-striped">
                                  <hr>
                                <thead>
                                    <th scope="col">Administrateur ENT</th>
                                    <th scope="col">IFAD</th>
                                    <th scope="col">Type Activité</th>
                                    <th scope="col">Action</th>
                                </thead>

                                    <tbody>
                                    <tr>
                                        <form action="{{ route('showbilan') }}"  method="POST" enctype="multipart/form-data">
                                           @csrf
                                            <td scope="row"> 
                                                <select class="custom-select" name="user_id">
                                                @foreach($bilanusers as $key=>$bilanuser)
                                                <option value="{{ $bilanuser->id}}"> {{ $bilanuser->nomutilisateur }} {{ $bilanuser->prenomutilisateur }}</option>
                                                @endforeach
                                                </select>
                                            </td>
                                            <td scope="row"> 
                                                <select class="custom-select" name="ifad_id">
                                                @foreach($bilanifads as $key=>$bilanifad)
                                                <option value="{{ $bilanifad->id}}"> {{ $bilanifad->LibelleIfad }} </option>
                                                @endforeach
                                                </select>
                                            </td>
                                            <td scope="row"> 
                                                <select class="custom-select " name="type_activite_id">
                                                @foreach($bilantypeactivites as $key=>$bilantypeactivite)
                                                <option value="{{ $bilantypeactivite->id}}"> {{ $bilantypeactivite->LibelleType }}</option>
                                                @endforeach
                                                </select>
                                            </td>
                                            <td scope="row">
                                            <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                     
                              </div>
                          </div>
                          <!-- fin cadre-->

                                  <hr/>
                             <!-- debut cadre-->
                <div class="card card-success collapsed-card">
                     <div class="card-header" >
                        <h3 class="card-title"><i class="fab fa-galactic-republic"></i> Etat de fonnctionnement de l'environnement technologique </h3>  
                       <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                       </div>
                     </div>
                 

                       <div class="card-body">
                                <table id="#" class="table table-bordered table-striped">
                                  <hr>
                                <thead>
                                    <th scope="col">Administrateur ENT</th>
                                    <th scope="col">IFAD</th>
                                    <th scope="col">Fonction</th>
                                    <th scope="col">Action</th>
                                </thead>

                                    <tbody>
                                    <tr>
                                        <form action="{{ route('etatfonctionnement') }}"  method="POST" enctype="multipart/form-data">
                                           @csrf
                                            <td scope="row"> 
                                                <select class="custom-select" name="user_id">
                                                @foreach($bilanusers as $key=>$bilanuser)
                                                <option value="{{ $bilanuser->id}}"> {{ $bilanuser->nomutilisateur }} {{ $bilanuser->prenomutilisateur }}</option>
                                                @endforeach
                                                </select>
                                            </td>
                                            <td scope="row"> 
                                                <select class="custom-select" name="ifad_id">
                                                @foreach($bilanifads as $key=>$bilanifad)
                                                <option value="{{ $bilanifad->id}}"> {{ $bilanifad->LibelleIfad }} </option>
                                                @endforeach
                                                </select>
                                            </td>
                                            <td scope="row"> 
                                                <select class="custom-select " name="fonction_id">
                                                @foreach($fonctions as $key=>$fonction)
                                                <option value="{{ $fonction->id}}"> {{ $fonction->LibelleFonction }}</option>
                                                @endforeach
                                                </select>
                                            </td>
                                            <td scope="row">
                                            <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                    </tbody>
                                </table>
                     
                              </div>
                          </div>
                          <!-- fin cadre-->
                          
                </div>
            </div>
         </div>
     </div>
@endsection
