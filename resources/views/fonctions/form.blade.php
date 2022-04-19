@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fonction</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Fonction</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Fonction</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-poll"></span>
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
                      <input type="text" class="form-control @error('LibelleFonction') is-invalid @enderror" name="LibelleFonction" placeholder="Rentrez le libelle..." value="{{ old('LibelleFonction') ?? $fonction->LibelleFonction }}" autofocus  required/>
                      @error('LibelleFonction')
                          <div class="invalid-feedback">
                              {{ $errors->first('LibelleFonction')}}
                          </div>   
                      @enderror
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>