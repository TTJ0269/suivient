@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rapport</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Rapport</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Rapport</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-edit"></span>
    </div>
  </div>
  <!-- /fin cadre -->

    <!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
      
               <div class="content">

                    <div class="form-group my-3">
                       <h4>Libelle</h4>
                    <input type="text" class="form-control @error('LibelleRapport') is-invalid @enderror" name="LibelleRapport" placeholder="Rentrez le libelle..." value="{{ old('LibelleRapport') ?? $rapport->LibelleRapport }}" autofocus  required/>
                    @error('LibelleRapport')
                        <div class="invalid-feedback">
                            {{ $errors->first('LibelleRapport')}}
                        </div>   
                    @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>