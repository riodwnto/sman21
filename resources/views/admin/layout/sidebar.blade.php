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
            <a href="/admin-area/data-ekstrakulikuler" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                Data Ekstrakulikuler
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Admin</span>
        </li>

        <li class="menu-item @if ($menu == 'admin') active @endif">
            <a href="/admin-area/admin" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-account' ></i>
                Data Admin
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
