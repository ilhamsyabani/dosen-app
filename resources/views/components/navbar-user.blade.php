<nav class="sb-topnav navbar navbar-expand navbar-light bg-light shadow-sm p-4">
    <a class="navbar-brand ps-3 text-primary fw-bold" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-primary" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>

    <div class="topbar-divider d-none d-sm-block"></div>
    
    <ul class="navbar-nav ms-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle text-primary" href="#" id="searchDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Search -->
            <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown m-4">
            <a class="nav-link text-primary" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; font-size: 20px;">
                    {{ Auth::user()->nama[0] }}
                </div>   
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw me-2 text-primary"></i>
                    <span class="me-2 d-none d-lg-inline text-primary small">{{ Auth::user()->nama }}</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                    <i class="fas fa-cogs fa-sm fa-fw me-2 text-primary"></i>
                    {{ __('Settings') }}
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                    <i class="fas fa-list fa-sm fa-fw me-2 text-primary"></i>
                    {{ __('Activity Log') }}
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </a>
            </div>
        </li>
    </ul>
</nav>
