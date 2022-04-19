<div class="content-header">
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="{{ route('type_utilisateurs.create') }}" class="btn btn-primary my-3">Nouveau Type d'utilisateur</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="nav-item"> 
                <form action="{{ route('recherchetypeutilisateur') }}" class="form-inline">
                    <div class="input-group mb-3">
                        <input class="form-control form-control-navbar" type="search" name="search" value="{{ request()->search ?? '' }}" placeholder="Recherche" aria-label="Search">
                        <div class="input-group-append">
                        <button class="input-group-text" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        </div>
                    </div>
                </form>
            </li>
            </ol>
         </div>
        </div>
      </div>
</div>