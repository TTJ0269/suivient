  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Accueil</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>-->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>


@unless (auth()->user()->unreadNotifications->isEmpty())
     <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        {{ auth()->user()->unreadNotifications->count() }}
          <i class="fas fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <span class="dropdown-header">Notification(s)</span>
          <div class="dropdown-divider"></div>
                     @foreach (auth()->user()->unreadNotifications as $notification)
                        <a href="{{route ('notification_commentaire',['commentaire' => $notification->data['idcommentaire'], 'notification' =>$notification->id]) }}" 
                        class="dropdown-item"> Mr(Mmd) {{ $notification->data['nameuser_responsable'] }} 
                        {{ $notification->data['prenomuser_responsable'] }} a commenté(e) votre activité: 
                        <strong>{{ $notification->data['activite_LibelleActivite'] }} </strong> </a>
                        <hr>
                     @endforeach
          <div class="dropdown-divider"></div>
      </li>
@endunless

 
 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-address-card"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">Status</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('profilshow') }}" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> Profil
                     <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                      <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <x-responsive-nav-link :href="route('logout')"
                                  onclick="event.preventDefault();
                                              this.closest('form').submit();">
                     <i class="fas fa-user mr-2"></i>{{ __('Deconnexion') }}
                          </x-responsive-nav-link>
                      </form>
            </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>

     </ul>
</nav>
  <!-- /.navbar -->