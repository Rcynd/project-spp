<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('') }}adminlte/img/download.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Project SPP</span>
      </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex " >
        <div class="image">
          <img src="{{ asset('') }}adminlte/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" >
          <a href="#" class="d-block">{{ Auth()->user()->nama_petugas }}</a>
        </div>
      </div>
  
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @can('admin')
          <li class="nav-item">
            <a href="/siswa" class="nav-link {{ Request::is('siswa*') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-male"></i>
              <p>
                Data Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/petugas" class="nav-link {{ Request::is('petugas*') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Petugas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/kelas" class="nav-link {{ Request::is('kelas*') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Data kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/spp" class="nav-link {{ Request::is('spp*') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-scroll"></i>
              <p>
                Data SPP
              </p>
            </a>
          </li>
          @endcan
          @can('petugas')
          <li class="nav-item">
            <a href="/transaksi" class="nav-link {{ Request::is('transaksi*') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                transaksi pembayaran
              </p>
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a href="/histori" class="nav-link {{ Request::is('histori*') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-history"></i>
              <p>
                History Pembayaran
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>