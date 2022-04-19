@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Activité du rapport</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Activité du rapport</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Activité du rapport</h3>
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
                 <br>
                 @foreach ($rapports as $rapport)
                   <h4 class="text-center">Activité du rapport: {{$rapport->LibelleRapport}} </h4>
                    <!-- Recuperation de l'id de l'activite depuis activite.index -->
                   <input type="number" hidden name="rapport_id" value="{{$rapport->id}}"/>
                 @endforeach
                 <br>

            <div class="form-group row">
                      <label for="text" class="col-sm-2 col-form-label">Fonction</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-poll"></i></span>
                            </div>
                            <select class="custom-select @error('fonction_id') is-invalid @enderror" name="fonction_id">
                                    @foreach($fonctions as $fonction)
                                <option value="{{ $fonction->id}}" {{ $activite_saisy->fonction_id = $fonction->id ? 'selected' : ''}}> {{ $fonction->LibelleFonction }} </option>
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

               <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Titre</label>
                  <div class="col-sm-10">
                      <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-tenge"></i></span>
                          </div>
                          <input type="text" class="form-control @error('TitreActiviteSaisie') is-invalid @enderror" name="TitreActiviteSaisie"  placeholder="Titre" value="{{ old('TitreActiviteSaisie') ?? $activite_saisy->TitreActiviteSaisie }}" required autofocus/>
                          @error('TitreActiviteSaisie')
                          <div class="invalid-feedback">
                              {{ $errors->first('TitreActiviteSaisie')}}
                          </div>   
                          @enderror
                      </div>
                  </div>
              </div>

              <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Dèscription</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                      </div>
                      <textarea type="text" class="form-control @error('DescriptionActiviteSaisie') is-invalid @enderror" name="DescriptionActiviteSaisie" placeholder="Dèscription" value="{{ old('DescriptionActiviteSaisie') ?? $activite_saisy->DescriptionActiviteSaisie }}" autofocus  required></textarea>
                      @error('DescriptionActiviteSaisie')
                      <div class="invalid-feedback">
                          {{ $errors->first('DescriptionActiviteSaisie')}}
                      </div>   
                      @enderror
                  </div>
                </div>
              </div> 

              <div class="row">
            <div class="col-6 chart">
                <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Libelle Fichier</label>
                    <div class="col-sm-8">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-tenge"></i></span>
                        </div>
                            <input type="text" class="form-control @error('libelleficher') is-invalid @enderror" name="libelleficher" placeholder="Rentrez le libelle..."/>
                            @error('libelleficher')
                                <div class="invalid-feedback">
                                    {{ $errors->first('libelleficher')}}
                                </div>   
                            @enderror
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-6 chart">
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Fichier</label>
                    <div class="col-sm-8">
                    <div class="input-group mb-3">
                          <div class="custom-file">
                              <input type="file" name="urlficher" class="@error('urlficher') is-invalid @enderror"/>
                              @error('urlficher')
                              <div class="invalid-feedback">
                                {{ $errors->first('urlficher')}}
                              </div>   
                              @enderror
                          </div>
                    </div>
                    </div>
                            <!-- Appler l'image quand elle est selectionnee-->
                            <div class="col-sm-2">
                              <div class='img-holder'>
                              </div>
                            </div> 
                          <!-- fin applelation-->
                </div>
            </div>
        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>