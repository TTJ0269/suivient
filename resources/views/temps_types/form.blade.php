@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Temps du type</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Temps du type</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Modification du Temps passé</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-copy"></span>
    </div>
  </div>
  <!-- /fin cadre -->

    <!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
              
               <div class="content">
                      <hr>
                 <input type="number" hidden  name="livret_id" value="{{$temps_type->livret_positionnement_id}}" >
               <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Type activité</label>
                  <div class="col-sm-10">
                       <div class="input-group mb-3">
                            <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-copy"></i></span>
                            </div>
                                <input type="text" class="form-control @error('LibelleType') is-invalid @enderror" name="LibelleType" placeholder="Rentrez le libelle..." value="{{ $temps_type->LibelleType }}" disabled/>
                                @error('LibelleType')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('LibelleType')}}
                                    </div>   
                                @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-7 chart">
                        <div class="form-group row">
                            <label for="name" class="col-sm-7 col-form-label">Temps</label>
                        <div class="col-sm-5">
                            <div class="input-group mb-3">
                                    <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    </div>
                                        <input type="number" class="form-control @error('TempsPost') is-invalid @enderror" name="TempsPost" placeholder="Rentrez le temps..." value="{{ $temps_type->TempsPost }}" autofocus  required/>
                                        @error('TempsPost')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('TempsPost')}}
                                            </div>   
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-1 chart">
                        <div class="form-group row">
                            <label for="name" class="col-sm-0 col-form-label"></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="min" value="min" disabled/>
                            </div>
                        </div>
 
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>