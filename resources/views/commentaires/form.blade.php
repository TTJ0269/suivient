@csrf
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Commentaire</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
              <li class="breadcrumb-item active">Commentaire</li>
            </ol>
           </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

    <!-- cadre general -->
    <div class="card card-secondary direct-chat direct-chat-secondary">
  <div class="card-header">
    <h3 class="card-title">Commentaire</h3>
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
                @foreach ($activite_saisies as $activite_saisie)
                    <div class="text-center">
                       <h4> Commentaire de l'activité: {{ $activite_saisie->TitreActiviteSaisie }} </h4>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fas fa-comments"></i></span>
                        </div>
                        <input type="number" hidden  name="activite_saisie_id" value="{{$activite_saisie->id}}">
                        <input type="text" hidden  name="activite_saisie_name" value="{{$activite_saisie->TitreActiviteSaisie}}">
                        <textarea cols="10" class="form-control @error('DescriptionCommentaire') is-invalid @enderror" name="DescriptionCommentaire" placeholder="Rentrez un commentaire..." autofocus  required></textarea>
                        @error('DescriptionCommentaire')
                            <div class="invalid-feedback">
                                {{ $errors->first('DescriptionCommentaire')}}
                            </div>   
                        @enderror
                    </div>
                @endforeach
           </div>
        </div>
    </div>
</div>