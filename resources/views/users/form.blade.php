@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Utilisateur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Utilisateur</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Utilisateur</h3>
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
                    <label for="text" class="col-sm-2 col-form-label">Login</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Rentrez le login de utilisateur..." value="{{ old('name') ?? $user->name }}" autofocus  required/>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $errors->first('name')}}
                            </div>   
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('nomutilisateur') is-invalid @enderror" name="nomutilisateur" placeholder="Rentrez le nom de l'utilisateur..." value="{{ old('nomutilisateur') ?? $user->nomutilisateur }}" autofocus  required/>
                        @error('nomutilisateur')
                            <div class="invalid-feedback">
                                {{ $errors->first('nomutilisateur')}}
                            </div>   
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Prénom</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('prenomutilisateur') is-invalid @enderror" name="prenomutilisateur" placeholder="Rentrez le prenom de l'utilisateur..." value="{{ old('prenomutilisateur') ?? $user->prenomutilisateur }}" autofocus  required/>
                        @error('prenomutilisateur')
                            <div class="invalid-feedback">
                                {{ $errors->first('prenomutilisateur')}}
                            </div>   
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Téléphone</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control @error('telutilisateur') is-invalid @enderror" name="telutilisateur" placeholder="Rentrez le tel de l'utilisateur..." value="{{ old('telutilisateur') ?? $user->telutilisateur }}" autofocus  required/>
                        @error('telutilisateur')
                            <div class="invalid-feedback">
                                {{ $errors->first('telutilisateur')}}
                            </div>   
                        @enderror
                        </div>
                    </div>
   
                    <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile" value="{{ old('image') ?? $user->image }}">
                                <label class="custom-file-label" for="validatedCustomFile"> Choisir une image...</label>
                                @error('image')
                            <div class="invalid-feedback">
                                {{ $errors->first('image')}}
                            </div>   
                            @enderror
                            </div>
                        </div>
                        <!-- Appler l'image quand elle est selectionnee-->
                         <div class="col-sm-2">
                            <div class='img-holder'>
                            </div>
                         </div> 
                         <!-- fin applelation--> 
                    </div>
                      

                    <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Rentrez email de l'utilisateur..." value="{{ old('email') ?? $user->email }}" autofocus  required/>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $errors->first('email')}}
                            </div>   
                        @enderror
                        </div>
                    </div>

                   <!-- <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Rentrez le mot de passe de l'utilisateur..." value="{{ old('password') ?? $user->password }}" autofocus  required/>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $errors->first('password')}}
                            </div>   
                        @enderror
                        </div>
                    </div>-->

                    <div class="form-group row">
                     <label for="text" class="col-sm-2 col-form-label">Type utilisateur</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-text-height"></i></span>
                                </div>
                                <select class="custom-select @error('type_utilisateur_id') is-invalid @enderror" name="type_utilisateur_id">
                                        @foreach($type_utilisateurs as $type_utilisateur)
                                    <option value="{{ $type_utilisateur->id}}" {{ $user->type_utilisateur_id = $type_utilisateur->id ? 'selected' : ''}}> {{ $type_utilisateur->libelletype }} </option>
                                    @endforeach
                                </select>
                                @error('type_utilisateur_id')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('type_utilisateur_id')}}
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