@extends('admin.layout.main')

@section('content')
@if (count($gallery) == 0)

@else
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area" class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/galeri"
        class="a-breadcrumbs">Data Galeri</a> / </span> Edit Data Foto</h4>

    <div class="mb-3">
        <i class="text-middle" data-feather="file-plus"></i>
        <h1 class="h3 d-inline align-middle">Form Edit Foto : {{ $gallery[0] -> id_galeri }}</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/admin-area/galeri/edit/update" method="POST" enctype="multipart/form-data">
                    <input type="text" readonly hidden name="id_galeri" value="{{ $gallery[0] -> id_galeri }}">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="card-body">
                                    <label class="form-label">Foto</label>
                                    <div class="card-body">
                                        <img src="{{ asset('img/gallery/'.$gallery[0] -> images) }}" alt="preview image" class="d-block rounded img-fluid" height="300" width="300" id="uploadedAvatar" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 col-lg-8">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Opsi Unggah</label>
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Pilih Foto</span>
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
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Judul</label>
                                        <input type="text" name="judul" class="form-control" required placeholder="Judul Gambar" value="{{ old('judul', $gallery[0] -> judul) }}">
                                        @error('judul')
                                        <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-select" id="select2" name="id_kategori" data-placeholder="Masukkan pilihan" required>
                                            <option></option>
                                            @foreach ($category as $data)
                                            <option @if ($data -> id_kategori === $gallery[0] -> id_kategori) selected @endif value="{{ $data -> id_kategori }}">{{ $data -> nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_kategori')
                                        <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="gallery-textarea" ">{{ old('deskripsi', $gallery[0] -> deskripsi) }}</textarea>
                                        @error('deskripsi')
                                        <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
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
                                    <a class="btn btn-warning" href="/admin-area/galeri">
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
@endif
@endsection