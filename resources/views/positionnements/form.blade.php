@csrf
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Positionnement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Positionnement</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

         <div class="row">
            <div class="col-12 col-sm-8">
              <div class="form-group">
              </div>
            </div>

            <div class="col-12 col-sm-4">
              <div class="form-group">
                  <div class="form-group clearfix">
                    <div class="icheck-danger">
                    <input type="radio" id="radioDangerGrille"  name="ValeurPost_Grille1" checked >
                    <label for="radioDangerGrille"> (0) Non observé </label>
                    </div>
                    <div class="icheck-orange">
                    <input type="radio" id="radioOrangeGrille" name="ValeurPost_Grille2" checked>
                    <label for="radioOrangeGrille"> (1) L'activité a été observée </label>
                    </div>
                    <div class="icheck-purple">
                    <input type="radio" id="radioPurpleGrille" name="ValeurPost_Grille3" checked>
                    <label for="radioPurpleGrille"> (2) L'activité a été réalisée avec de l'aide </label>
                    </div>
                    <div class="icheck-primary">
                    <input type="radio" id="radioPrimaryGrille" name="ValeurPost_Grille5" checked>
                    <label for="radioPrimaryGrille"> (3) L'activité a été réalisée en toute autonomie </label>
                    </div>
                    <div class="icheck-success">
                    <input type="radio" id="radioSuccessGrille" name="ValeurPost_Grille4" checked>
                    <label for="radioSuccessGrille"> (4) L'activité a été réalisée et maîtrisée </label>
                    </div>
                </div>
              </div>
            </div>
         </div>
                   <div class="text-center">
                    <h5> Semaine: {{$semaine_livret}} </h5>
                    <input type="text" hidden  name="semaine_livret" value="{{$semaine_livret}}" />
                   </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#livret" data-toggle="tab">Livret</a></li>
                  <!--<li class="nav-item"><a class="nav-link" href="#fonction_typeactivite" data-toggle="tab">Fonction & Type d'activité</a></li> -->
                </ul>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="livret">
                     @foreach($fonctions as $fonction)
                        <div class="col-12 col-sm-12"cd>
                            <div class="card card- collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title"> <strong style="color:rgb(12, 39, 120);"> {{$fonction['fonction_libelle']}} </strong></h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="container-fluid">

                                    @foreach($fonction['typeactivites'] as $typeactivite)
                                    <div class="row">
                                    <div class="col-12 col-sm-10"cd>
                                        <div class="card card-">
                                            <div class="card-header">
                                                <h3 class="card-title"> <strong> {{$typeactivite['typeactivite_libelle']}} </strong></h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="container-fluid">
                                                @foreach($typeactivite['activites'] as $activite)
                                                    <div class="row">
                                                        <div class="col-12 col-sm-9">
                                                        <label class="form-check-label"> <i>{{$activite->LibelleActivite}}</i>  </label>
                                                        </div>
                                                        <div class="col-12 col-sm-3">
                                                        <!--input class="form-check-input" type="checkbox" value="{{$activite->id}}" name="activite_id_{{$activite->id}}"-->
                                                        <div class="form-group clearfix">
                                                            <div class="icheck-danger d-inline">
                                                            <input type="radio" id="radioDanger{{$activite->id}}" value="0" name="ValeurPost_{{$activite->id}}" checked>
                                                            <label for="radioDanger{{$activite->id}}"></label>
                                                            </div>
                                                            <div class="icheck-orange d-inline">
                                                            <input type="radio" id="radioOrange{{$activite->id}}" value="1" name="ValeurPost_{{$activite->id}}">
                                                            <label for="radioOrange{{$activite->id}}"></label>
                                                            </div>
                                                            <div class="icheck-purple d-inline">
                                                            <input type="radio" id="radioPurple{{$activite->id}}" value="2" name="ValeurPost_{{$activite->id}}">
                                                            <label for="radioPurple{{$activite->id}}"></label>
                                                            </div>
                                                            <div class="icheck-primary d-inline">
                                                            <input type="radio" id="radioPrimary{{$activite->id}}" value="3" name="ValeurPost_{{$activite->id}}">
                                                            <label for="radioPrimary{{$activite->id}}"></label>
                                                            </div>
                                                            <div class="icheck-success d-inline">
                                                            <input type="radio" id="radioSuccess{{$activite->id}}" value="4" name="ValeurPost_{{$activite->id}}">
                                                            <label for="radioSuccess{{$activite->id}}"></label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <p> <hr> </p>
                                                @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-2">
                                        <label for="">Temps (min)</label>
                                        <input type="number" class="form-control @error('TempsPost_') is-invalid @enderror" name="TempsPost_{{$typeactivite['typeactivite_id']}}"/>
                                        @error('TempsPost_')
                                            <div class="invalid-feedback">
                                            <!--{{ $errors->first('TempsPost_')}}-->
                                            </div>
                                        @enderror
                                    </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                  </div>

                  <!--<div class="tab-pane" id="fonction_typeactivite">

                      <div class="timeline timeline-inverse">
                          <timeline time label>
                          <div class="time-label">
                            <span class="bg-primary">
                              Liste des types activités classés par fonction de l'Administrateur ENT
                            </span>
                          </div>

                      </div>
                  </div> -->
                  <!-- /.tab-pane -->
                </div>

                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
