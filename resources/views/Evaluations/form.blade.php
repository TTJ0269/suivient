@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Evaluation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Evaluation</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Evaluation</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-crop-alt"></span>
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
                    <label for="text" class="col-sm-2 col-form-label">Type Evaluation</label>
                        <div class="col-sm-10">
                <select class="custom-select @error('type_evaluation_id') is-invalid @enderror" name="type_evaluation_id">
                    @foreach($type_evaluations as $type_evaluation)
                    <option value="{{ $type_evaluation->id}}" {{ $evaluation->type_evaluation_id = $type_evaluation->id ? 'selected' : ''}}> {{ $type_evaluation->LibelleEvaluation }} </option>
                    @endforeach
                </select>
                @error('type_evaluation_id')
                    <div class="invalid-feedback">
                        {{ $errors->first('type_evaluation_id')}}
                    </div>   
                @enderror
                </div>
            </div>

            <div class="form-group row">
                      <label for="text" class="col-sm-2 col-form-label">Libelle</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control @error('LibelleEval') is-invalid @enderror" name="LibelleEval" placeholder="Rentrez le libelle..." value="{{ old('LibelleEval') ?? $evaluation->LibelleEval }}" autofocus  required/>
                        @error('LibelleEval')
                            <div class="invalid-feedback">
                                {{ $errors->first('LibelleEval')}}
                            </div>   
                        @enderror
                    </div>
            </div>
                    

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Position</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                      </div>
                        <select class="form-control @error('valeur') is-invalid @enderror" name="valeur" id="valeur">
                        <option value="1" {{ $evaluation->valeur == "1" ? 'selected' : '' }}> 1 </option>
                        <option value="2" {{ $evaluation->valeur == "2" ? 'selected' : '' }}> 2 </option>
                        <option value="3" {{ $evaluation->valeur == "3" ? 'selected' : '' }}> 3 </option>
                        <option value="4" {{ $evaluation->valeur == "4" ? 'selected' : '' }}> 4 </option>
                      </select>
                      @error('valeur')
                      <div class="invalid-feedback">
                          {{ $errors->first('valeur')}}
                      </div>   
                      @enderror
                  </div>
                </div>
             </div> 

        </div>
    </div>
</div>