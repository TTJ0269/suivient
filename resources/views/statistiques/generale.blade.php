
@extends('layouts.apppositionnment')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0">Statistiques</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Statistiques</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
      function Chrono($TotSec) {
          $heures  =  bcdiv($TotSec,  3600,  0);
          $minutes  =  (bcdiv($TotSec,  60,  0)  %  60);
          $secondes = $TotSec-(($heures * 3600) + ($minutes * 60));
          return $heures  .  ":"  .  $minutes  .  ":"  .  $secondes . "0";
        }
    ?>

   <div class="container">
               <div class="text-center">
                  <img src="{{ asset('storage/imageifad/aedsuivi.png') }}" class="img elevation" style="width: 200px; height: 100px;" alt="AED Image">
               </div>

        <div class="row my-2">
            <div class="col-12 col-sm-5">
              <div class="form-group">
                  @foreach ($users as $user)
                        <br>
                    <div class="">
                      <br>
                      <h5 style="color:blue;">{{$user->LibelleLivret}}</h5>
                      <h5 style="color:blue;">Administrateur ENT: <strong style="color:black;">{{$user->nomutilisateur}} {{$user->prenomutilisateur}} </strong> <h5>
                      <h5 style="color:blue;">IFAD: <strong style="color:black;"> {{$ifad}} </strong></h5>
                    </div>
                  @endforeach
              </div>
            </div>
            <div class="col-12 col-sm-7">
              <div class="form-group">
                     <div class="text-center">
                       <h4 style="color:blue;"><strong> Nombre d'heure par fonction </strong></h4>
                     </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <th scope="col" style="color:blue;"><h5><strong> Fonctions </strong></h5></th>
                          <th scope="col" style="color:blue;"><h5><strong> Heures </strong></h5></th>
                          <th scope="col" style="color:blue;"><h5 align="right"><strong> % </strong></h5></th>
                      </thead>

                          <tbody>
                          @foreach ($nombre_heures as $nombre_heure)
                          <tr>
                          <th scope="row"><h5> {{ $nombre_heure->LibelleFonction }} </h5></th>
                          <th scope="row"><h5> <?php echo Chrono($nombre_heure->seconde);?> </h5></th>
                          <th scope="row"><h5 align="right"> {{ round($nombre_heure->temps,0) }} </h5></th>
                          </tr>
                        @endforeach
                          <tr style="color:blue;">
                          <th scope="row"><h5><strong> Nombre d'heure total & Pourcentage </strong></h5></th>
                          <th scope="row"><h5><strong> <?php echo Chrono($tempstotal);?> </strong></h5></th>
                          <th scope="row"><h5 align="right"><strong> 100 </strong></h5></th>
                          </tr>
                          </tbody>
                    </table>
              </div>
            </div>
         </div>

           <div class="card card-info">
              <div class="card-header">
                  <h3 class="card-title">Activités Confiées</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                  <div class="chart">
                    <canvas id="activite"></canvas>
                  </div>
               </div>
            </div>

            @foreach ($collection_fonctions as $collection_fonction)
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Fonction : {{$collection_fonction['fonction_libelle']}}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                        <a href="#"> </a>
                        <canvas id="fonction{{$collection_fonction['fonction_id']}}"></canvas>
                        </div>
                    </div>
                </div>
             @endforeach

                <div class="card card-info">
                  <div class="card-header">
                      <h3 class="card-title">Nombre d'heure par fonction</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                          </button>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="col-8 chart">
                      <canvas id="nombre_heure" width="500" height="400"></canvas>
                    </div>
                  </div>
                </div>

                <br>
    </div>
    <div class="row no-print">
        <div class="col-12">
          <button onclick="window.print()" class="btn btn-success float-left"><i class="far fa-credit-card"></i> Imprimer</button>
        </div>
    </div>

@endsection
