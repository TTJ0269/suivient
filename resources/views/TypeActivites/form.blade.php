@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Type Activité</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Type Activité</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Type Activité</h3>
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
                      <label for="text" class="col-sm-2 col-form-label">Libelle</label>
                     <div class="col-sm-10">
                    <input type="text" class="form-control @error('LibelleType') is-invalid @enderror" name="LibelleType" placeholder="Rentrez le libelle..." value="{{ old('LibelleType') ?? $type_activite->LibelleType }}" autofocus  required/>
                    @error('LibelleType')
                        <div class="invalid-feedback">
                            {{ $errors->first('LibelleType')}}
                        </div>   
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                      <label for="text" class="col-sm-2 col-form-label">Fonction</label>
                          <div class="col-sm-10">
                    <select class="custom-select @error('fonction_id') is-invalid @enderror" name="fonction_id">
                            @foreach($fonctions as $fonction)
                        <option value="{{ $fonction->id}}" {{ $type_activite->fonction_id = $fonction->id ? 'selected' : ''}}> {{ $fonction->LibelleFonction }} </option>
                        @endforeach
                    </select>
                    @error('fonction_id')
                        <div class="invalid-feedback">
                            {{ $errors->first('fonction_id')}}
                        </div>   
                    @enderror
                    </div>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>