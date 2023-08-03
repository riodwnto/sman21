@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/rak" class="a-breadcrumbs">Data Siswa</a> / </span>Edit</h4>
    <div class="card">
        <h5 class="card-header">
            Edit Siswa 
        </h5>
        <form action="/admin-area/siswa/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                         <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">NISN</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="nisn" required value="{{ old('nisn' ,$sis[0] -> nisn) }}"/>
                                @error('nisn')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Nama Siswa</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="siswa_nama" required value="{{ old('siswa_nama' ,$sis[0] -> siswa_nama) }}"/>
                                <input class="form-control" type="hidden" name="siswa_id" required readonly value="{{ $sis[0] -> siswa_id }}"/>
                                @error('siswa_nama')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" name="siswa_ttl" required value="{{ old('siswa_ttl' ,$sis[0] -> siswa_ttl) }}"/>
                                @error('siswa_ttl')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Gender</label>
                            <div class="col-md-9">
                                
                                <select name="siswa_gender" required class="form-control">
                                    <option value="{{$sis[0]->siswa_gender}}">{{$sis[0]->siswa_gender}}</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('siswa_gender')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                         <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="siswa_alamat" class="form-control" value="{{$sis[0]->siswa_alamat}}">{{$sis[0]->siswa_alamat}}</textarea>
                                @error('siswa_alamat')
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