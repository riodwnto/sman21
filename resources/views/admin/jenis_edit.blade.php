@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/jenis" class="a-breadcrumbs">Data Rak</a> / </span>Edit</h4>
    <div class="card">
        <h5 class="card-header">
            Edit Jenis
        </h5>
        <form action="/admin-area/jenis/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Nama Jenis</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="nama_jenis" required value="{{ old('nama_jenis' ,$jen[0] -> nama_jenis) }}"/>
                                <input class="form-control" type="hidden" name="id_jenis" required readonly value="{{ $jen[0] -> id_jenis }}"/>
                                @error('nama_jenis')
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
                            <a class="btn btn-warning" href="/admin-area/jenis">
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