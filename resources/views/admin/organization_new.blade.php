@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/struktur-organisasi" class="a-breadcrumbs">Data
                Organisasi</a> / </span>Data Baru</h4>
    <div class="card">
        <h5 class="card-header">
            Tambah Data Struktur Organisasi
        </h5>
        <form action="/admin-area/struktur-organisasi/submit" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card-body">
                        <label class="form-label">Foto</label>
                        <div class="card-body">
                            <img src="" alt="preview image" class="d-block rounded img-fluid" height="300" width="300"
                                id="uploadedAvatar" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Opsi Unggah</label>
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Pilih Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input name="foto" required type="file" id="upload" class="account-file-input"
                                        hidden accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                                <p class="text-muted mb-0">Tipe file : .jpg atau .png. Ukuran maks
                                    800KB</p>
                                @error('data_struktur')
                                <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" card-body">
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
                            <a class="btn btn-warning" href="/admin-area/struktur-organisasi">
                                <span class="align-middle">Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection