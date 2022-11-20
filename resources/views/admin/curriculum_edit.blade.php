@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/kurikulum" class="a-breadcrumbs">Data
                Kurikulum</a> / </span>Edit Data Kurikulum</h4>
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            Edit Data Kurikulum
        </h5>
        <form action="/admin-area/kurikulum/edit/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Kode Mata Kuliah</label>
                            <input type="text" name="kode_matkul" readonly id="kode_matkul" class="form-control" placeholder="Kode mata kuliah" maxlength="7" value="{{ old('kode_matkul', $curriculum[0] -> kode_matkul) }}" required>
                            @error('kode_matkul')
                            <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Mata Kuliah</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama mata kuliah" maxlength="100" value="{{ old('nama', $curriculum[0] -> nama) }}" required>
                            @error('nama')
                            <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">SKS</label>
                            <select class="form-select" id="select2" name="sks" data-placeholder="Masukkan pilihan">
                                <option></option>
                                <option @if (old('sks', $curriculum[0] -> sks) == '2') selected @endif value="2">2</option>
                                <option @if (old('sks', $curriculum[0] -> sks) == '3') selected @endif value="3">3</option>
                                <option @if (old('sks', $curriculum[0] -> sks) == '4') selected @endif value="4">4</option>
                            </select>
                            @error('sks')
                            <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Semester</label>
                            <select class="form-select" id="select2" name="semester" data-placeholder="Masukkan pilihan">
                                <option></option>
                                <option @if (old('semester', $curriculum[0] -> semester) == '1') selected @endif value="1">Semester 1</option>
                                <option @if (old('semester', $curriculum[0] -> semester) == '2') selected @endif value="2">Semester 2</option>
                                <option @if (old('semester', $curriculum[0] -> semester) == '3') selected @endif value="3">Semester 3</option>
                                <option @if (old('semester', $curriculum[0] -> semester) == '4') selected @endif value="4">Semester 4</option>
                                <option @if (old('semester', $curriculum[0] -> semester) == '5') selected @endif value="5">Semester 5</option>
                                <option @if (old('semester', $curriculum[0] -> semester) == '6') selected @endif value="6">Semester 6</option>
                                <option @if (old('semester', $curriculum[0] -> semester) == '7') selected @endif value="7">Semester 7</option>
                                <option @if (old('semester', $curriculum[0] -> semester) == '8') selected @endif value="8">Semester 8</option>
                            </select>
                            @error('semester')
                            <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Tipe Mata Kuliah</label>
                            <select class="form-select" id="select2" name="tipe" data-placeholder="Masukkan pilihan">
                                <option></option>
                                <option @if (old('tipe', $curriculum[0] -> tipe) == 'w') selected @endif value="w">Mata Kuliah Wajib</option>
                                <option @if (old('tipe', $curriculum[0] -> tipe) == 'p') selected @endif value="p">Mata Kuliah Peminatan</option>
                            </select>
                            @error('tipe')
                            <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" required id="summernote">{{ old('keterangan', $curriculum[0] -> keterangan) }}</textarea>
                            @error('keterangan')
                            <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                                {{ $message }}
                            </div>
                            @enderror
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
                            <a class="btn btn-warning" href="/admin-area/kurikulum">
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