@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Activité</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Activité</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Activité</h3>
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

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Type Activité</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-text-height"></i></span>
                      </div>
                      <select class="custom-select @error('type_activite_id') is-invalid @enderror" name="type_activite_id">
                        @foreach($type_activites as $type_activite)
                        <option value="{{ $type_activite->id}}" {{ $activite->type_activite_id = $type_activite->id ? 'selected' : ''}}> {{ $type_activite->LibelleType }}</option>
                        @endforeach
                      </select>
                   </div> 
                      @error('type_activite_id')
                      <div class="invalid-feedback">
                          {{ $errors->first('type_activite_id')}}
                      </div>   
                    @enderror
                 </div>
              </div>

               <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Libelle</label>
                  <div class="col-sm-10">
                      <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-tenge"></i></span>
                          </div>
                          <input type="text" class="form-control @error('LibelleActivite') is-invalid @enderror" name="LibelleActivite"  placeholder="Libelle" value="{{ old('LibelleActivite') ?? $activite->LibelleActivite }}" required autofocus/>
                          @error('LibelleActivite')
                          <div class="invalid-feedback">
                              {{ $errors->first('LibelleActivite')}}
                          </div>   
                          @enderror
                      </div>
                  </div>
              </div>

              <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Identifiant</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                      </div>
                      <input type="number" class="form-control @error('identifiant_activite') is-invalid @enderror" name="identifiant_activite" placeholder="identifiant" value="{{ old('identifiant_activite') ?? $activite->identifiant_activite }}" autofocus  required/>
                      @error('identifiant_activite')
                      <div class="invalid-feedback">
                          {{ $errors->first('identifiant_activite')}}
                      </div>   
                      @enderror
                  </div>
                </div>
              </div> 
                    
                </div>
            </div>
        </div>
    </div>
</div>