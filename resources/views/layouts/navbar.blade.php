<ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav User -->
    @can('isUser')
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
            <figure class="img-profile rounded-circle avatar font-weight-bold bg-success"
                data-initial="{{ Auth::user()->name[0] }}"></figure>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item {{ request()->is('user/profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Profile') }}
            </a>
            <a class="dropdown-item {{ request()->is('user/ubah-password') ? 'active' : '' }}"
                href="{{ route('changepassword') }}">
                <i class="fa fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Ubah Password') }}
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Logout') }}
            </a>
        </div>
    </li>
    @elsecan('isAdmin')
    <!-- Nav Admin -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
            <figure class="img-profile rounded-circle avatar font-weight-bold bg-success"
                data-initial="{{ Auth::user()->name[0] }}"></figure>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item {{ request()->is('admin/profile') ? 'active' : '' }}"
                href="{{ route('admin.profil') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Profile') }}
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Logout') }}
            </a>
        </div>

    </li>
    @endcan



</ul>