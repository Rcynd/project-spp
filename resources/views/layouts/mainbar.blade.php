
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ asset('') }}" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Logout Menu -->
        <li class="nav-item dropdown">
        <div>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
            Logout
          </button>
            

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        </li>
    </ul>
  </nav>

  <div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <p>Yakin, ingin Logout?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary"><a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('OK') }}
         </a></button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->