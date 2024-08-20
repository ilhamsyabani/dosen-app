<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <div class="ms-2 text-uppercase mt-2">Pengguna</div>
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'Admin Fakultas')
                <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                    Admin
                </a>
            @endif
            <a class="nav-link {{ request()->routeIs('dosen.*') ? 'active' : '' }}" href="{{ route('dosen.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                Dosen
            </a>
            
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'Admin Fakultas')
                <div class="ms-2 text-uppercase mt-2">Fakultas</div>
                <a class="nav-link collapsed {{ request()->is('fakultas.*') ? 'active' : '' }}" href="#"
                    data-bs-toggle="collapse" data-bs-target="#collapseFakultas" aria-expanded="false"
                    aria-controls="collapseFakultas">
                    <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                    Data Fakultas
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->is('fakultas/*') ? 'show' : '' }}" id="collapseFakultas"
                    aria-labelledby="headingFakultas" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('fakultas.index') ? 'active' : '' }}"
                            href="{{ route('fakultas.index') }}">Data Fakultas</a>
                        <a class="nav-link {{ request()->is('fakultas/error*') ? 'active' : '' }}"
                            href="{{ url('/fakultas/error') }}">Admin Fakultas</a>
                    </nav>
                </div>
            @endif
            <div class="ms-2 text-uppercase mt-2">Departemen</div>
            <a class="nav-link {{ request()->is('departemen*') ? 'active' : '' }}" href="{{ route('departemen.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                Data Departemen
            </a>

            <div class="ms-2 text-uppercase mt-2">Inputan Data</div>
            <a class="nav-link {{ request()->is('skim*') ? 'active' : '' }}" href="{{ route('skim.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                SKIM
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->role }}
    </div>
</nav>
