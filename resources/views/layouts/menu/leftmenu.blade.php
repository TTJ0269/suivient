  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('vendors/dist/img/aedr.png') }}" alt="AED" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TOGO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/image/' .Auth::user()->imageutilisateur) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
         <a href="#" class="d-block"> {{Auth::user()->nomutilisateur}}  {{Auth::user()->prenomutilisateur}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      @can('view','App\Models\User')
          <li class="nav-item"> <!--?=activenemu('type_utilisateurs')?-->
            <a href="{{ route('type_utilisateurs.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Type Utilisateur
              </p>
            </a>
          </li>
       
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Utilisateur
              </p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="{{ route('ifads.index') }}" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                IFAD
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('ifad_moniteurs.index') }}" class="nav-link">
              <i class="nav-icon fas fa-school"></i> /
              <i class="nav-icon fas fa-user"></i>
              <p>
                IFAD Moniteur
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('fonctions.index') }}" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>
                Fonction
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('type_activites.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Type Activité
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="{{ route('activites.index') }}" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Activité
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('type_evaluations.index') }}" class="nav-link">
              <i class="nav-icon fas fa-clone"></i>
              <p>
                Savoir être <!-- Type Evaluation-->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('evaluations.index') }}" class="nav-link">
              <i class="nav-icon fas fa-crop-alt"></i>
              <p>
                Evaluation
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('historique_index') }}" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Historique
              </p>
            </a>
          </li>
      @endcan

      @can('viewAny','App\Models\User')

       <li class="nav-item">
            <a href="{{ route('rapports.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Rapport
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('livret_positionnements.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Livret de Positionnement
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('fichers.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Fichier
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('commentaires.index') }}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Commentaire
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Visualisation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('rapport_valider') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport validé</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rapport_non_valider') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport non validé</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Information du suivi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{ route('statistique_index') }}" class="nav-link">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Statistique</p>  
                </a>
              </li>

            </ul>
          </li>
        @endcan

        @can('autorisationMoniteur','App\Models\User')

          <li class="nav-item">
            <a href="{{ route('positionnements.index') }}" class="nav-link">
              <i class="nav-icon fas fa-signal"></i>
              <p>
                Positionnement
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('livret_positionnements.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Livret de Positionnement
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('rapports.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Rapport
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('activite_saisies.index') }}" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Activite du rapport
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('fichers.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Fichier
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('commentaires.index') }}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Commentaire
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Visualisation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('rapport_valider') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport validé</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rapport_non_valider') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport non validé</p>
                </a>
              </li>

            </ul>
          </li>

          @endcan

          @can('dgifad','App\Models\User')
          <li class="nav-item">
            <a href="{{ route('rapports.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Rapport
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('livret_positionnements.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Livret de Positionnement
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('placements.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Evaluation
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Visualisation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('rapport_valider') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport validé</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rapport_non_valider') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport non validé</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Information du suivi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{ route('statistique_index') }}" class="nav-link">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Statistique</p>  
                </a>
              </li>

            </ul>
          </li>
          @endcan

          @can('superviseur','App\Models\User')
            <li class="nav-item">
            <a href="{{ route('rapports.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Rapport
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('livret_positionnements.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Livret de Positionnement
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Visualisation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('rapport_valider') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport validé</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rapport_non_valider') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rapport non validé</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Information du suivi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="{{ route('statistique_index') }}" class="nav-link">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Statistique</p>  
                </a>
              </li>

            </ul>
          </li>
          @endcan
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

