<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link d-flex gap-2">
            <img src="/assets/img/logo21.png" width="50"> 
            <span class="app-brand-logo demo" style="">
                Dashboard
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
            <span class="menu-header-text">Home</span>
        </li>

        <li class="menu-item @if ($menu == 'berita') active @endif">
            <a href="/admin-area/berita-terkini" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                Berita Terkini
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Profil</span>
        </li>

        <li class="menu-item @if ($menu == 'guru') active @endif">
            <a href="/admin-area/dirgu" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                Direktori Guru
            </a>
        </li>

        <li class="menu-item @if ($menu == 'tu') active @endif">
            <a href="/admin-area/dirtu" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                Direktori Tata Usaha
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Ekstrakulikuler</span>
        </li>

        <li class="menu-item @if ($menu == 'ekskul') active @endif">
            <a href="/admin-area/ekskul" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                Data Ekstrakulikuler
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Admin</span>
        </li>

        <li class="menu-item @if ($menu == 'adm') active @endif">
            <a href="/admin-area/adm" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-account' ></i>
                Data Admin
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Perpustakaan</span>
        </li>
        <li class="menu-item @if ($menu == 'siswa') active @endif">
            <a href="/admin-area/siswa" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user' ></i>
                Siswa
            </a>
        </li>
        <li class="menu-item @if ($menu == 'rak') active @endif">
            <a href="/admin-area/rak" class="menu-link">
                <i class='menu-icon tf-icons bx bxl-squarespace' ></i>
                Rak Buku
            </a>
        </li>
        <li class="menu-item @if ($menu == 'jenis') active @endif">
            <a href="/admin-area/jenis" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-book' ></i>
                Jenis Buku
            </a>
        </li>
        <li class="menu-item @if ($menu == 'buku') active @endif">
            <a href="/admin-area/buku" class="menu-link">
                <i class='menu-icon tf-icons bx bx-book-add' ></i>
                Buku
            </a>
        </li>
        <li class="menu-item @if ($menu == 'transaksi') active @endif">
            <a href="/admin-area/transaksi" class="menu-link">
                <i class='menu-icon tf-icons bx bx-transfer' ></i>
                Transaksi
            </a>
        </li>
        <li class="menu-item @if ($menu == 'riwayat') active @endif">
            <a href="/admin-area/riwayat" class="menu-link">
                <i class='menu-icon tf-icons bx bx-history' ></i>
                Riwayat
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
