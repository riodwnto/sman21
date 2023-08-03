@extends('admin.layout.main')

@section('content')
<?php foreach ($transaksi as $t): ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                    class="a-breadcrumbs">Riwayat</a> / <a href="/admin-area/riwayat" class="a-breadcrumbs">Edit
                    Transaksi</a> / </span>Baru</h4>
        <div class="card">
            <h5 class="card-header">
                Edit Transaksi {{$t->transaksi_kode}}
            </h5>
            <form action="/admin-area/riwayat/update" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="mb-3 row">
                                <label class="col-md-3 col-form-label">Siswa</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="siswa_id" required
                                        value="{{ $t->siswa_nama}}" readonly />
                                    @error('siswa_id')
                                    <div id="defaultFormControlHelp" class="form-text">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="mb-3 row">
                                <label class="col-md-3 col-form-label">Kode</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="transaksi_kode" required
                                        value="{{ $t->transaksi_kode}}" readonly />
                                    @error('transaksi_kode')
                                    <div id="defaultFormControlHelp" class="form-text">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="mb-3 row">
                                <label class="col-md-3 col-form-label">Tanggal Pinjam</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="transaksi_tanggalpinjam" required
                                        value="{{ $t->transaksi_tanggalpinjam}}" readonly />
                                    @error('transaksi_tanggalpinjam')
                                    <div id="defaultFormControlHelp" class="form-text">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="mb-3 row">
                                <label class="col-md-3 col-form-label">Tanggal Kembali</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="date" name="transaksi_tanggalkembali" required
                                        value="{{ $t->transaksi_tanggalkembali}}" />
                                    @error('transaksi_tanggalkembali')
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
                                <a class="btn btn-warning" href="/admin-area/riwayat">
                                    <span class="align-middle">Kembali</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach ?>

@endsection