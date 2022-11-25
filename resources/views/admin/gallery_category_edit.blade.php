@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/kategori-galeri" class="a-breadcrumbs">Kategori
                Foto</a> / </span>Edit</h4>
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            Edit Kategori Foto
        </h5>
        <form action="/admin-area/kategori-galeri/edit/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">ID Kategori</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="id_kategori" value="{{ $category[0] -> id_kategori }}"
                                    readonly />
                                @error('id_kategori')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Nama Kategori</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="nama_kategori" value="{{ old('nama_kategori' ,$category[0] -> nama_kategori) }}" />
                                @error('nama_kategori')
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
                            <a class="btn btn-warning" href="/admin-area/kategori-galeri">
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