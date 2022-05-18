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
      <h3 class="card-title">Evaluation</h3>
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

                <input type="number" hidden  name="placement" value="{{$placement->id}}" >

                     <table id="exa" class="table table-bordered table-striped">
                      <thead>
                          <th scope="col">Type évaluation</th>
                          <th scope="col">Placement_évaluation</th>
                      </thead>

                          <tbody>
                          @foreach($type_evaluations as $key=>$type_evaluation)
                          <tr>
                          <th scope="row"> <a href="#"> {{$type_evaluation->LibelleEvaluation}} </a></th>
                          <th>
                                <div class="form-group clearfix">
                                        <div class="icheck-danger d-inline">
                                        <input type="radio" id="radioDanger" value="1" name="ValeurPlace" checked>
                                        <label for="radioDanger"></label>
                                        </div>
                                        <div class="icheck-orange d-inline">
                                        <input type="radio" id="radioOrange" value="2" name="ValeurPlace">
                                        <label for="radioOrange"></label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                        <input type="radio" id="radioPrimary" value="3" name="ValeurPlace">
                                        <label for="radioPrimary"></label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                        <input type="radio" id="radioSuccess" value="4" name="ValeurPlace">
                                        <label for="radioSuccess"></label>
                                        </div>
                                </div>
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
