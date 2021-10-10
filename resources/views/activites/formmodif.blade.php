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
      @foreach($rapports as $rapport)
    <h3 class="card-title"> Rapport : {{ $rapport->LibelleRapport}} </h3>
      @endforeach
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-paste"></span>
    </div>
  </div>
  <!-- /fin cadre -->

  <!-- /.content-header -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12">

            <div class="content">
                      <h2 class="text-center">Activité</h2>

             <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Type Activité</label>
                <div class="col-sm-10">
                  <select class="custom-select @error('type_activite_id') is-invalid @enderror" name="type_activite_id">
                      @foreach($type_activites as $type_activite)
                      <option value="{{ $type_activite->id}}" {{ $activite->type_activite_id = $type_activite->id ? 'selected' : ''}}> {{ $type_activite->LibelleType }}</option>
                      @endforeach
                    </select>
                      @error('type_activite_id')
                      <div class="invalid-feedback">
                          {{ $errors->first('type_activite_id')}}
                      </div>   
                    @enderror
                 </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Titre</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('LibelleActivite') is-invalid @enderror" name="LibelleActivite"  placeholder="Libelle" value="{{ old('LibelleActivite') ?? $activite->LibelleActivite }}" autofocus  required/>
                    @error('LibelleActivite')
                    <div class="invalid-feedback">
                        {{ $errors->first('LibelleActivite')}}
                    </div>   
                    @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea cols="10" rows="2" class="form-control @error('DescriptionActivite') is-invalid @enderror" name="DescriptionActivite" placeholder="Description" value="{{ old('DescriptionActivite') ?? $activite->DescriptionActivite }}" autofocus  required></textarea>
                  @error('DescriptionActivite')
                    <div class="invalid-feedback">
                        {{ $errors->first('DescriptionActivite')}}
                    </div>   
                    @enderror
                </div>
              </div>   

              <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Lieu</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('LieuActivite') is-invalid @enderror" name="LieuActivite" placeholder="Lieu de l'activite" value="{{ old('LieuActivite') ?? $activite->LieuActivite }}" autofocus  required/>
                  @error('LieuActivite')
                    <div class="invalid-feedback">
                        {{ $errors->first('LieuActivite')}}
                    </div>   
                    @enderror
                </div>
              </div>  

              <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Date </label>
                <div class="col-sm-3">
                  <input type="date" class="form-control @error('Date') is-invalid @enderror" name="Date" autofocus  required/>
                  @error('Date')
                    <div class="invalid-feedback">
                        {{ $errors->first('Date')}}
                    </div>   
                    @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="time" class="col-sm-2 col-form-label">Heure du début</label>
                <div class="col-sm-3">
                  <input type="time" class="form-control" name="heuredebut" autofocus  required/>
                  @error('heuredebut')
                    <div class="invalid-feedback">
                        {{ $errors->first('heuredebut')}}
                    </div>   
                    @enderror
                </div>
              </div>
              
              <div class="form-group row">
                <label for="time" class="col-sm-2 col-form-label">Heure de fin</label>
                <div class="col-sm-3">
                  <input type="time" class="form-control" name="heurefin" autofocus  required/>
                  @error('heurefin')
                    <div class="invalid-feedback">
                        {{ $errors->first('heurefin')}}
                    </div>   
                    @enderror
                </div>
              </div>              
           </div>
      </div>
   </div>
  </div>
</div>