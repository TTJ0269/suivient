@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fichier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Fichier</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Fichier</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="user" class="nav-icon fas fa-file"></span>
    </div>
  </div>
  <!-- /fin cadre -->

    <!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                          <h2 class="text-center">Fichier de l'activité: <?php echo $_POST['LibelleActivite'] ?> </h2>
               <div class="content">

               <!-- Recuperation de l'id de l'activite depuis activite.index -->
                 <input type="number" hidden name="activite_id" value="<?php echo $_POST['activite_id'] ?>"/>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Libelle fichier</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('libelleficher') is-invalid @enderror" name="libelleficher" placeholder="Rentrez le libelle..." value="{{ old('libelleficher') ?? $ficher->libelleficher }}" autofocus  required/>
                            @error('libelleficher')
                                <div class="invalid-feedback">
                                    {{ $errors->first('libelleficher')}}
                                </div>   
                            @enderror
                            </div>
                     </div>
                    
                    <div class="form-group row">
                       <label for="name" class="col-sm-2 col-form-label">Fichier Joint</label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" name="urlficher" class="custom-file-input @error('urlficher') is-invalid @enderror" id="validatedCustomFile"/>
                            <label class="custom-file-label" for="validatedCustomFile"> Choisir un fichier...</label>
                            @error('urlficher')
                        <div class="invalid-feedback">
                            {{ $errors->first('urlficher')}}
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

                </div>
            </div>
        </div>
    </div>
</div>