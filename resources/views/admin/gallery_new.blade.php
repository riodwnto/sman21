@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area" class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/galeri"
        class="a-breadcrumbs">Data Galeri</a> / </span> Upload Foto Baru</h4>

    <div class="mb-3">
        <i class="text-middle" data-feather="file-plus"></i>
        <h1 class="h3 d-inline align-middle">Form Foto Baru</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/admin-area/galeri/submit" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="card-body">
                                    <label class="form-label">Foto</label>
                                    <div class="card-body">
                                        <img src="" alt="preview image" class="d-block rounded img-fluid" height="300"
                                            width="300" id="uploadedAvatar" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 col-lg-8">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Opsi Unggah</label>
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Pilih Foto</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input name="foto" required type="file" id="upload"
                                                            class="account-file-input" hidden
                                                            accept="image/png, image/jpeg" />
                                                    </label>
                                                    <button type="button"
                                                        class="btn btn-outline-secondary account-image-reset mb-4">
                                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Reset</span>
                                                    </button>
                                                    <p class="text-muted mb-0">Tipe file : .jpg atau .png. Ukuran maks
                                                        800KB</p>
                                                    @error('images')
                                                    <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-8">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Judul</label>
                                                <input type="text" name="judul" class="form-control" required
                                                    placeholder="Judul Gambar" value="{{ old('judul') }}">
                                                @error('judul')
                                                <div id="defaultFormControlHelp" class="form-text">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <input type="text" name="kategori_new" class="form-control"
                                                    placeholder="Kategori Baru" id="kategori_new" readonly hidden>
                                        <div class="input-group" id="kategori">
                                            <select class="form-select" id="select2" name="id_kategori" data-placeholder="Masukkan pilihan">
                                                <option></option>
                                                @foreach ($category as $data)
                                                <option value="{{ $data -> id_kategori }}">{{ $data -> nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target=#modal-add-data id="btnNew">Kategori Baru</button>
                                        </div>
                                        @error('id_kategori')
                                        <div id="defaultFormControlHelp" class="form-text">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        @error('nama_kategori')
                                        <div id="defaultFormControlHelp" class="form-text">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="gallery-textarea" required>{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                        <div id="defaultFormControlHelp" class="form-text">
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
<div class="modal fade" id="modal-add-data" tabindex="-1" aria-labelledby="modal-add-data-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-add-data-label">Kategori Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="deleteModalData()"></button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama Kategori</label>
                    <input type="text" class="form-control" name="kategori_input" id="kategori_input">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="deleteModalData()">Tutup</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="saveDataModal()">Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection