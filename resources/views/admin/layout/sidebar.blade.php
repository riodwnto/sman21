<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo" style="">
                <img src="{{ asset('main/img/logo-icon.ico') }}" alt="">
            </span>
            <!--<span class="app-brand-text demo menu-text fw-bolder ms-2">IF-Admin</span>-->
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if ($menu == 'home') active @endif">
            <a href="/admin-area" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Beranda</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Berita</span>
        </li>

        <li class="menu-item @if ($menu == 'kegiatan') active @endif">
            <a href="/admin-area/agenda-kegiatan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                Agenda Kegiatan
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Tentang</span>
        </li>

        <li class="menu-item @if ($menu == 'informasi') active @endif">
            <a href="/admin-area/informasi-umum" class="menu-link">
                <i class="menu-icon tf-icons bx bx-info-circle"></i>
                Informasi Umum
            </a>
        </li>

        <li class="menu-item @if ($menu == 'dosen') active @endif">
            <a href="/admin-area/dosen-pengajar" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                Dosen Pengajar
            </a>
        </li>

        <li class="menu-item @if (($menu == 'galeri') || ($menu == 'kategori')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div>Galeri</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item @if ($menu == 'galeri') active @endif">
                    <a href="/admin-area/galeri" class="menu-link">
                        <div>Galeri</div>
                    </a>
                </li>
                <li class="menu-item @if ($menu == 'kategori') active @endif">
                    <a href="/admin-area/kategori-galeri" class="menu-link">
                        <div>Kategori</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if ($menu == 'organisasi') active @endif">
            <a href="/admin-area/struktur-organisasi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                Struktur Organisasi
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Akademik</span>
        </li>

        <li class="menu-item @if ($menu == 'kurikulum') active @endif">
            <a href="/admin-area/kurikulum" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                Kurikulum
            </a>
        </li>

        <li class="menu-item @if ($menu == 'prestasi_akademik') active @endif">
            <a href="/admin-area/prestasi-akademik" class="menu-link">
                <i class="menu-icon tf-icons bx bx-trophy"></i>
                Prestasi Akademik
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Pengguna</span>
        </li>

        <li class="menu-item @if ($menu == 'pengguna') active @endif">
            <a href="/admin-area/akun" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-account' ></i>
                Data Pengguna
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
