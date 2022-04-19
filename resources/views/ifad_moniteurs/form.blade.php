@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">IFAD Moniteur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">IFAD Moniteur</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">IFAD Moniteur</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-user"></span>
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
                     <label for="text" class="col-sm-2 col-form-label">Moniteur ENT</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-text-height"></i></span>
                                </div>
                                <select class="custom-select @error('user_id') is-invalid @enderror" name="user_id">
                                        @foreach($users as $user)
                                    <option value="{{ $user->id}}" {{ $ifad_moniteur->user_id = $user->id ? 'selected' : ''}}> {{ $user->nomutilisateur }} {{ $user->prenomutilisateur }} ({{ $user->libelletype }})</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('user_id')}}
                                    </div>   
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                     <label for="text" class="col-sm-2 col-form-label">IFAD</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-text-height"></i></span>
                                </div>
                                <select class="custom-select @error('ifad_id') is-invalid @enderror" name="ifad_id">
                                        @foreach($ifads as $ifad)
                                    <option value="{{ $ifad->id}}" {{ $ifad_moniteur->ifad_id = $ifad->id ? 'selected' : ''}}> {{ $ifad->LibelleIfad }} </option>
                                    @endforeach
                                </select>
                                @error('ifad_id')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ifad_id')}}
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