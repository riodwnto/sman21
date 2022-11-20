@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area" class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/dosen-pengajar"
        class="a-breadcrumbs">Prestasi Akademik</a> / </span> Data Baru</h4>
    <div class="mb-3">
        <i class="text-middle" data-feather="file-plus"></i>
        <h1 class="h3 d-inline align-middle">Form Prestasi Akademik Baru</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/admin-area/prestasi-akademik/submit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Umum</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">NIM Mahasiswa</label>
                                    <input type="number" name="nrp_mhs" class="form-control" placeholder="NIM Mahasiswa" value="{{ old('nrp_mhs') }}" required>
                                    @error('nrp_mhs')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Mahasiswa</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" value="{{ old('nama') }}" required>
                                    @error('nama')
                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Foto</label>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                                height="100" width="100" id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Unggah Foto</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input name="foto" type="file" id="upload" class="account-file-input" hidden
                                                        accept="image/png, image/jpeg" />
                                                </label>
                                                <button type="button"
                                                    class="btn btn-outline-secondary account-image-reset mb-4">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>
                                                <p class="text-muted mb-0">Tipe file : .jpg atau .png. Ukuran maks 800KB</p>
                                                @error('images')
                                                <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Prestasi Akademik</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Data Prestasi</label>
                            <textarea name="prestasi" id="summernote">{{ old('prestasi') }}</textarea>
                            @error('prestasi')
                            <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <div class="text-start">
                                        <button class="btn btn-primary" type="submit">
                                            <span class="align-middle">Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="text-end">
                                    <a class="btn btn-warning" href="/admin-area/dosen-pengajar">
                                        <span class="align-middle">Kembali</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection