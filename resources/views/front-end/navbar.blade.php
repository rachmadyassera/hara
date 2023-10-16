<nav class="navbar navbar-expand-sm bg-primary">
    <a class="navbar-brand" href="{{ url('/') }}">Hara</a>
    <div class="nav-collapse">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a href="{{ url('/data-rapat')}}" class="nav-link">
                Data Rapat
            </a>
        </li>
        <li class="nav-item active">
            <a href="{{ url('/lokasi-rapat')}}" class="nav-link">
                Lokasi Rapat
            </a>
        </li>
        </ul>
    </div>
      <form class="form-inline ml-auto">
      </form>
      @guest
         <ul class="navbar-nav navbar-right">
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        </ul>
      @else
      <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="#" class="dropdown-item has-icon">
              <i class="far fa-user"></i> Profile
            </a>
            <a href="#" class="dropdown-item has-icon">
              <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="#" class="dropdown-item has-icon">
              <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt" ></i> {{ __('Logout') }}
            </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
              </form>
          </div>
        </li>
      </ul>
      @endguest

  </nav>
