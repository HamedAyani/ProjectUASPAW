<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column mt-2">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>

        @can('visitor')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/visitor') ? 'active' : '' }}" href="/dashboard/visitor">
            <span data-feather="book"></span>
            Daftar Buku
          </a>
        </li>
        @endcan

        @can('admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/admin') ? 'active' : '' }}" href="/dashboard/admin">
            <span data-feather="user"></span>
            Data Buku Admin
          </a>
        </li>
        @endcan

        @can('head')    
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/head') ? 'active' : '' }}" href="/dashboard/head">
            <span data-feather="user-check"></span>
            Data Master Head
          </a>
        </li>
        @endcan

      </ul>
    </div>
  </nav>