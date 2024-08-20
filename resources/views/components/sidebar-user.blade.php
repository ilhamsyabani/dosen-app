<nav class="mt-2 sidebar-expand-lg sidebar-wrapper bg-body-secondary sb-sidenav shadow-sm">
    <!--begin::Sidebar Menu-->
    <ul class="nav sidebar-menu flex-column mt-4" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <li class="nav-item}">
            <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer2"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <hr>
        <li class="nav-header">Data Dosen</li>
        <li class="nav-item {{ request()->is('dashboard/detail*', 'dashboard/jabatan*', 'dashboard/studi*', 'dashboard/kompetensi*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-person-circle"></i>
                <p>
                    Data Pribadi
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('detail.index') }}" class="nav-link {{ request()->is('dashboard/detail*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-lines-fill"></i>
                        <p>Biodata</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jabatan.index') }}" class="nav-link {{ request()->is('dashboard/jabatan*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-briefcase"></i>
                        <p>Jabatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('studi.index') }}" class="nav-link {{ request()->is('dashboard/studi*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book"></i>
                        <p>Riwayat Pendidikan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kompetensi.index') }}" class="nav-link {{ request()->is('dashboard/kompetensi*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-award"></i>
                        <p>Kompetensi</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ request()->is('dashboard/pengajaran*', 'dashboard/bimbingan*', 'dashboard/pengujian*', 'dashboard/bahan*', 'dashboard/pembinaan*', 'dashboard/pembimbingan*', 'dashboard/kunjungan*', 'dashboard/eksternal*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-file-earmark-text"></i>
                <p>
                    Pendidikan
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('pengajaran.index') }}" class="nav-link {{ request()->is('dashboard/pengajaran*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-check"></i>
                        <p>Pengajaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bimbingan.index') }}" class="nav-link {{ request()->is('dashboard/bimbingan*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-building"></i>
                        <p>Bimbingan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengujian.index') }}" class="nav-link {{ request()->is('dashboard/pengujian*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>Pengujian Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bahan.index') }}" class="nav-link {{ request()->is('dashboard/bahan*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-bookmark"></i>
                        <p>Bahan Ajar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembinaan.index') }}" class="nav-link {{ request()->is('dashboard/pembinaan*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-hand-thumbs-up"></i>
                        <p>Pembinaan Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembimbingan.index') }}" class="nav-link {{ request()->is('dashboard/pembimbingan*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Pembimbingan Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kunjungan.index') }}" class="nav-link {{ request()->is('dashboard/kunjungan*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-map"></i>
                        <p>Kunjungan Ilmiah</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('eksternal.index') }}" class="nav-link {{ request()->is('dashboard/eksternal*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-globe"></i>
                        <p>Pengajaran Luar Kampus</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ request()->is('dashboard/penelitian*', 'dashboard/publikasi*', 'dashboard/haki*', 'dashboard/pengabdian*', 'dashboard/pkm*', 'dashboard/pengelola*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-journal-text"></i>
                <p>
                    Penelitian
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('penelitian.index') }}" class="nav-link {{ request()->is('dashboard/penelitian*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-journal"></i>
                        <p>Penelitian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('publikasi.index') }}" class="nav-link {{ request()->is('dashboard/publikasi*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-file-earmark-text"></i>
                        <p>Publikasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('haki.index') }}" class="nav-link {{ request()->is('dashboard/haki*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-award"></i>
                        <p>Haki</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengabdian.index') }}" class="nav-link {{ request()->is('dashboard/pengabdian*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-heart"></i>
                        <p>Pengabdian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pkm.index') }}" class="nav-link {{ request()->is('dashboard/pkm*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>PKM Insidental</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengelola.index') }}" class="nav-link {{ request()->is('dashboard/pengelola*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-database"></i>
                        <p>Pengelolaan Jurnal</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ request()->is('dashboard/profesi*', 'dashboard/penghargaan*', 'dashboard/penunjang*', 'dashboard/delegasi*', 'dashboard/pertemuan*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-star"></i>
                <p>
                    Penunjang
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('profesi.index') }}" class="nav-link {{ request()->is('dashboard/profesi*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-badge"></i>
                        <p>Profesi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penghargaan.index') }}" class="nav-link {{ request()->is('dashboard/penghargaan*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-trophy"></i>
                        <p>Penghargaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penunjang.index') }}" class="nav-link {{ request()->is('dashboard/penunjang*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>Penunjang Lain</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('delegasi.index') }}" class="nav-link {{ request()->is('dashboard/delegasi*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Delegasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pertemuan.index') }}" class="nav-link {{ request()->is('dashboard/pertemuan*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-calendar-event"></i>
                        <p>Pertemuan Ilmiah</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end::Sidebar Menu-->
</nav>


<style>
    .nav .active {
        background: #ffffff !important;
        color: blue !important;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px !important;
        border-radius: 8px !important;
    }
</style>


<script>
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true,
    };
    document.addEventListener("DOMContentLoaded", function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (
            sidebarWrapper &&
            typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
        ) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>
