<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3">
        <i class="fa fa-bars"></i>
    </button>

    <h5 class="ml-3 fw-bold text-primary">Admin Panel</h5>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ms-auto">
        <!-- User Info -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <!-- Nama User dari Session -->
                <span class="me-2 d-none d-lg-inline text-gray-600 small">
                    {{ Auth::user()->name ?? 'Guest' }}
                </span>

                <!-- Avatar Otomatis -->
                <img class="img-profile rounded-circle"
                     src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Guest') }}&background=4e73df&color=fff&size=40">
            </a>

            <!-- Dropdown -->
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
