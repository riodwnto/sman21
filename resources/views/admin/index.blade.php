@extends('admin.layout.main')
@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat datang, {{ Auth::user()->name }} 🎉</h5>
                            <p class="mb-4">
                                Kamu berada di 
                                <strong id="city" style="font-size: 20px"></strong> 
                                dengan cuaca hari ini 
                                <img src="" id="weather" class="tooltip-weather" alt="Ikon Cuaca.">
                                , suhu sekitar yaitu 
                                <span style="font-size: 20px" id="temp" class="tooltip-temp"></span>
                                dan kelembapan sekitar 
                                <span id="humidity" style="font-size: 20px"></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('admin/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                alt="View Badge User"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mb-4 order-1">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Status Data</h5>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="bx bx-task"></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Agenda Kegiatan</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $activity_count }}</h6>
                                    <span class="text-muted">Data</span>
                                    <a href="/admin-area/agenda-kegiatan" class="btn btn-sm btn-outline-primary">Open</a>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="bx bx-info-circle"></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Informasi Umum</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">@if ($information_count === 1) Filled @else Empty @endif </h6>
                                    <a href="/admin-area/informasi-umum" class="btn btn-sm btn-outline-primary">Open</a>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="bx bx-group"></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Dosen Pengajar</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $lecturer_count }}</h6>
                                    <span class="text-muted">Data</span>
                                    <a href="/admin-area/dosen-pengajar" class="btn btn-sm btn-outline-primary">Open</a>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="bx bx-image"></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kategori Galeri</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $category_count }}</h6>
                                    <span class="text-muted">Kategori</span>
                                    <a href="/admin-area/kategori-galeri" class="btn btn-sm btn-outline-primary">Open</a>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="bx bx-images"></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Galeri Foto</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $gallery_count }}</h6>
                                    <span class="text-muted">Photos</span>
                                    <a href="/admin-area/galeri" class="btn btn-sm btn-outline-primary">Open</a>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="bx bx-list-ol"></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Struktur Organisasi</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $organization_count }}</h6>
                                    <span class="text-muted">Data</span>
                                    <a href="/admin-area/struktur-organisasi" class="btn btn-sm btn-outline-primary">Open</a>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="bx bx-book"></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kurikulum</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">Filled : </h6>
                                    <span class="text-muted">{{ $curriculum_count }} Data</span>
                                    <a href="/admin-area/kurikulum" class="btn btn-sm btn-outline-primary">Open</a>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="bx bxs-user-account"></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Pengguna</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $user_count }}</h6>
                                    <span class="text-muted">Users</span>
                                    <a href="/admin-area/akun" class="btn btn-sm btn-outline-primary">Open</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="col-12 col-lg-6 order-2  order-md-3 order-lg-2 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Website Traffic (Per Week)</h5>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active">
                            <div class="d-flex p-4 pt-3">
                                <div>
                                    <small class="text-muted d-block">Today Traffic</small>
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">{{ count($countervisit[0]) }} Visits</h6>
                                    </div>
                                </div>
                            </div>
                            <div id="profileReportChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-12 order-3 order-md-3 order-lg-2 mb-4">
            <div class="card overflow-hidden mb-4">
                <div class="card-header">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Preview Website</h5>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="container">
                        <div>
                            <embed src="../" width="100%" height="1000" onload="getUrl()">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection
