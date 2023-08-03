@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/adm" class="a-breadcrumbs">Data
                Buku</a> / </span>Baru</h4>
    <div class="card">
        <h5 class="card-header">
            Tambah Buku Baru
        </h5>
        <form action="/admin-area/buku/insert" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Judul Buku</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="buku_judul" required />
                                @error('buku_judul')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Kode</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="buku_kode" value="{{$buku_kode}}" required  readonly />
                                @error('buku_kode')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Penulis</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="buku_penulis" required />
                                @error('buku_penulis')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Penerbit</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="buku_penerbit" required />
                                @error('buku_penerbit')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Tahun Terbit</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="buku_tahunterbit" required />
                                @error('buku_tahunterbit')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Stok</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="buku_stok" required />
                                @error('buku_stok')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Sinopsis</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="buku_sinopsis" required></textarea>
                                @error('buku_sinopsis')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Jenis</label>
                            <div class="col-md-9">
                                <select name="jenis_id" class="form-control" required >
                                    <option value="">- Pilih -</option>
                                    @foreach ($jenis as $data)
                                        <option value="{{$data -> id_jenis}}">{{$data -> nama_jenis}}</option>
                                    @endforeach
                                </select>
                                @error('jenis_id')
                                <div id="defaultFormControlHelp" class="form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Penyimpanan</label>
                            <div class="col-md-9">
                                <select name="rak_id" class="form-control" required >
                                    <option value="">- Pilih -</option>
                                    @foreach ($rak as $data)
                                        <option value="{{$data -> rak_id}}">{{$data -> rak_nama}} - {{$data -> rak_lokasi}}</option>
                                    @endforeach
                                </select>
                                @error('rak_id')
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
                            <a class="btn btn-warning" href="/admin-area/buku">
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