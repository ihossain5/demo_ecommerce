<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <img class="img-profile rounded-circle" src="" style="max-width: 60px">
      <span class="ml-2 d-none d-lg-inline text-white small"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Activity Log
          </a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
             {{ __('Logout') }}
          </a>
         <form id="logout-form" action="#" method="POST" class="d-none">
             @csrf
         </form>
       
        </div>
      </li>
    </ul>
  </nav>