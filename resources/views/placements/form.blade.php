@csrf
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Evaluation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Evaluation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- cadre general -->
      <div class="card card-secondary direct-chat direct-chat-secondary">
    <div class="card-header">
      <h3 class="card-title">Evaluation du {{ $date }}</h3>
      <div class="card-tools">
        <span data-toggle="tooltip" title="user" class="nav-icon fas fa-book-open"></span>
      </div>
    </div>
    <!-- /fin cadre -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
             
             <br>
          <div class="row">
                <div class="col-12 col-sm-9">
                <div class="form-group">
                </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="form-group"> 
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                            <input type="radio" id="radioDangerGrille"  name="ValeurPost_Grille1" checked >
                            <label for="radioDangerGrille">(1)</label>
                            </div>
                            <div class="icheck-orange d-inline">
                            <input type="radio" id="radioOrangeGrille" name="ValeurPost_Grille3" checked>
                            <label for="radioOrangeGrille">(2)</label>
                            </div>
                            <div class="icheck-primary d-inline">
                            <input type="radio" id="radioPrimaryGrille" name="ValeurPost_Grille4" checked>
                            <label for="radioPrimaryGrille">(3)</label>
                            </div>
                            <div class="icheck-success d-inline">
                            <input type="radio" id="radioSuccessGrille" name="ValeurPost_Grille5" checked>
                            <label for="radioSuccessGrille">(4)</label>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                       <input type="number" hidden  name="user_id" value="{{$id_user}}" >

                     <table id="exa" class="table table-bordered table-striped">
                      <thead>
                          <th scope="col">Numéro</th>
                          <th scope="col">Type évaluation</th>
                          <th scope="col">Placement_évaluation</th>
                          <th scope="col">Evaluation</th>
                      </thead>

                          <tbody>
                          @foreach($collections as $key=>$collection)
                          <tr>
                          <th scope="row"> <a href="#"> {{++$key}} </a> </th>
                          <th scope="row"> <a href="#"> {{$collection[1]}} </a></th>
                          <th>
                                <div class="form-group clearfix">
                                        <div class="icheck-danger d-inline">
                                        <input type="radio" id="radioDanger{{$collection[0]}}" value="1" name="ValeurPlace_{{$collection[0]}}" checked>
                                        <label for="radioDanger{{$collection[0]}}"></label>
                                        </div>
                                        <div class="icheck-orange d-inline">
                                        <input type="radio" id="radioOrange{{$collection[0]}}" value="2" name="ValeurPlace_{{$collection[0]}}">
                                        <label for="radioOrange{{$collection[0]}}"></label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                        <input type="radio" id="radioPrimary{{$collection[0]}}" value="3" name="ValeurPlace_{{$collection[0]}}">
                                        <label for="radioPrimary{{$collection[0]}}"></label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                        <input type="radio" id="radioSuccess{{$collection[0]}}" value="4" name="ValeurPlace_{{$collection[0]}}">
                                        <label for="radioSuccess{{$collection[0]}}"></label>
                                        </div>
                                </div>
                          </th>
                          <th scope="row">
                                  @foreach($collection[2] as $key=>$evaluation)
                                  <h6>({{$evaluation->valeur}}) {{$evaluation->LibelleEval}} </h6> 
                                  @endforeach
                            </th>
                          @endforeach
                          </tr>
                          </tbody>
                      </table>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>