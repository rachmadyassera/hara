<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}">Siakra</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/dashboard') }}">SA</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>
        <li class="dropdown">
          <a href="{{ url('/dashboard') }}" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
          <a href="{{ url('/opd') }}" class="nav-link "><i class="fas fa-university"></i><span>Organisasi</span></a>
        </li>
        <li class="dropdown">
          <a href="{{ url('/user') }}" class="nav-link "><i class="fas fa-users"></i><span>Users</span></a>
        </li>
        <li class="dropdown">
          <a href="{{ url('/get-all-location') }}" class="nav-link "><i class="fas fa-map-marker-alt"></i><span>Lokasi</span></a>
        </li>
        <li class="dropdown">
          <a href="{{ url('/get-all-confrence') }}" class="nav-link "><i class="far fa-handshake"></i><span>Rapat</span></a>
        </li>
      </ul>

    </aside>
  </div>
