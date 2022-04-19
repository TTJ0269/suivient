@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Type Utilisateur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Type Utilisateur</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

 <!-- cadre general -->
 <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Type Utilisateur</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="users" class="nav-icon fas fa-users"></span>
    </div>
  </div>
  <!-- /fin cadre -->

    <!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
    <hr>
            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Type Utilisateur</label>
                <div class="col-sm-10">
                    <select class="form-control @error('libelletype') is-invalid @enderror" name="libelletype" id="libelletype">
                      <option value="Moniteur ENT" {{ $type_utilisateur->libelletype == "Moniteur ENT" ? 'selected' : '' }}>Moniteur ENT</option>
                      <option value="Responsable du suivi" {{ $type_utilisateur->libelletype == "Responsable du suivi" ? 'selected' : '' }}> Responsable du suivi </option>
                      <option value="Superviseur" {{ $type_utilisateur->libelletype == "Superviseur" ? 'selected' : '' }}> Superviseur </option>
                      <option value="DG IFAD" {{ $type_utilisateur->libelletype == "DG IFAD" ? 'selected' : '' }}> DG IFAD </option>
                      <option value="Administrateur" {{ $type_utilisateur->libelletype == "Administrateur" ? 'selected' : '' }}> Administrateur </option>
                    </select>
                    @error('libelletype')
                    <div class="invalid-feedback">
                        {{ $errors->first('libelletype')}}
                    </div>   
                    @enderror
                </div>
            </div>
    </div>
</div>