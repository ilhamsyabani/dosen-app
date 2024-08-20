<nav class="sb-sidenav accordion sb-sidenav-light shadow-sm" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link mt-4 {{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Data Dosen</div>
            <a class="nav-link collapsed {{ request()->is('fakultas.*') ? 'active' : '' }}" href="#"
                data-bs-toggle="collapse" data-bs-target="#collapseProfil" aria-expanded="false"
                aria-controls="collapseProfil">
                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                Data Pribadi
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->is('Profil.*') ? 'show' : '' }}" id="collapseProfil"
                aria-labelledby="headingProfil" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->is('detail.*') ? 'active' : '' }}"
                        href="{{ route('detail.index') }}">Biodata</a>
                    <a class="nav-link {{ request()->is('jabatan.*') ? 'active' : '' }}"
                        href="{{ route('jabatan.index') }}">Jabatan</a>
                    <a class="nav-link {{ request()->is('studi.*') ? 'active' : '' }}"
                        href="{{ route('studi.index') }}">Riwayat Pendidikan</a>
                    <a class="nav-link {{ request()->is('kompetensi.*') ? 'active' : '' }}"
                        href="{{ route('kompetensi.index') }}">kompetensi</a>
                </nav>
            </div>
            <a class="nav-link collapsed {{ request()->is('fakultas.*') ? 'active' : '' }}" href="#"
                data-bs-toggle="collapse" data-bs-target="#collapsePendidikan" aria-expanded="false"
                aria-controls="collapsePendidikan">
                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                Pendidikan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->is('Profil.*') ? 'show' : '' }}" id="collapsePendidikan"
                aria-labelledby="headingPendidikan" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->is('pengajaran.*') ? 'active' : '' }}"
                        href="{{ route('pengajaran.index') }}">Pengajaran</a>
                    <a class="nav-link {{ request()->is('bimbingan.*') ? 'active' : '' }}"
                        href="{{ route('bimbingan.index') }}">Bimbingan</a>
                    <a class="nav-link {{ request()->is('pengujian.*') ? 'active' : '' }}"
                        href="{{ route('pengujian.index') }}">Pengujian Mahasiswa</a>
                    <a class="nav-link {{ request()->is('bahan.*') ? 'active' : '' }}"
                        href="{{ route('bahan.index') }}">Bahan Ajar</a>
                    <a class="nav-link {{ request()->is('pembinaan.*') ? 'active' : '' }}"
                        href="{{ route('pembinaan.index') }}">Pembinaan</a>
                    <a class="nav-link {{ request()->is('pembimbingan.*') ? 'active' : '' }}"
                        href="{{ route('pembimbingan.index') }}">pembimbingan</a>
                    <a class="nav-link {{ request()->is('kunjungan.*') ? 'active' : '' }}"
                        href="{{ route('kunjungan.index') }}">Kunjungan</a>
                    <a class="nav-link {{ request()->is('eksternal.*') ? 'active' : '' }}"
                        href="{{ route('eksternal.index') }}">Pengajaran Luar kampus</a>
                </nav>
            </div>
            <a class="nav-link collapsed {{ request()->is('penelitian.*') ? 'active' : '' }}" href="#"
                data-bs-toggle="collapse" data-bs-target="#collapsePenelitian" aria-expanded="false"
                aria-controls="collapsePenelitian">
                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                Penelitan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->is('penelitian.*') ? 'show' : '' }}" id="collapsePenelitian"
                aria-labelledby="headingPenelitian" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->is('penelitian.*') ? 'active' : '' }}"
                        href="{{ route('penelitian.index') }}">Penelitan</a>
                    <a class="nav-link {{ request()->is('publikasi.*') ? 'active' : '' }}"
                        href="{{ route('publikasi.index') }}">Publikasi</a>
                    <a class="nav-link {{ request()->is('haki.*') ? 'active' : '' }}"
                        href="{{ route('haki.index') }}">Haki</a>
                    <a class="nav-link {{ request()->is('pengabdian.*') ? 'active' : '' }}"
                        href="{{ route('pengabdian.index') }}">Pengabdian</a>
                    <a class="nav-link {{ request()->is('pkm.*') ? 'active' : '' }}"
                        href="{{ route('pkm.index') }}">PKM Insidetal</a>
                    <a class="nav-link {{ request()->is('pengelola.*') ? 'active' : '' }}"
                        href="{{ route('pengelola.index') }}">Pengalolaan Jurnal</a>
                </nav>
            </div>
            <a class="nav-link collapsed {{ request()->is('penghargaan.*') ? 'active' : '' }}" href="#"
                data-bs-toggle="collapse" data-bs-target="#collapsepenghargaan" aria-expanded="false"
                aria-controls="collapsepenghargaan">
                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                Penunjang
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->is('penghargaan.*') ? 'show' : '' }}" id="collapsepenghargaan"
                aria-labelledby="headingPenelitian" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->is('profesi.*') ? 'active' : '' }}"
                        href="{{ route('profesi.index') }}">Profesi</a>
                    <a class="nav-link {{ request()->is('penghargaan.*') ? 'active' : '' }}"
                        href="{{ route('penghargaan.index') }}">Penghargaan</a>
                    <a class="nav-link {{ request()->is('penunjang.*') ? 'active' : '' }}"
                        href="{{ route('penunjang.index') }}">Penunjang Lain</a>
                    <a class="nav-link {{ request()->is('delegasi.*') ? 'active' : '' }}"
                        href="{{ route('delegasi.index') }}">Delegasi</a>
                    <a class="nav-link {{ request()->is('pertemuan.*') ? 'active' : '' }}"
                        href="{{ route('pertemuan.index') }}">Pertemuan ilmiah</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->role }}
    </div>
</nav>