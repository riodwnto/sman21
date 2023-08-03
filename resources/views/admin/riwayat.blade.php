@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> /</span> Data Riwayat</h4>
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-row-reverse">
                        <div class="row mb-4">
                            <div class="col-auto">
                                <label for="cari" class="col-form-label">Cari Riwayat</label>
                              </div>
                              <div class="col-auto">
                                <form action="/admin-area/riwayat" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input required type="text" id="cari" class="form-control" name="cari" placeholder="Masukkan keyword...">
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </div>
                                @error('cari')
                                <div class="form-text">
                                    <i class="ri-error-warning-line"></i>
                                    Masukkan keyword pencarian yang valid.
                                </div>
                                @enderror
                                </form>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Siswa</th>
                        <th>Kode</th>
                        <th>Tgl.Pinjam</th>
                        <th>Tgl.Kembali</th>
                        <th>Denda</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($riwayat) === 0 || Session::has('message'))
                    <tr>
                        <td colspan="3" class="text-center">Tidak Ada Data!</td>
                    </tr>
                    @else
                    @foreach ($riwayat as $data)
                    <tr>
                        <th scope="row">{{ $loop -> iteration }}</th>
                        <td>{{ $data -> siswa_nama }}</td>
                        <td>{{ $data -> transaksi_kode }}</td>
                        <td>{{ $data -> transaksi_tanggalpinjam }}</td>
                        <td>{{ $data -> transaksi_tanggalkembali }}</td>
                        <td>{{ $data -> transaksi_denda }}</td>
                        <td>{{ $data -> transaksi_status }}</td>
                        <td>
                            <?php if($data->transaksi_status != 'Dikembalikan'){ ?>
                                <a class="btn btn-sm btn-primary" href="/admin-area/riwayat/edit/{{ Crypt::encrypt($data -> transaksi_kode) }}">
                                    <span class="align-middle">Edit</span>
                                </a>
                            <?php } ?>
                            <a class="btn btn-sm btn-warning" href="/admin-area/riwayat/detail/{{ Crypt::encrypt($data -> transaksi_kode) }}">
                                <span class="align-middle">Detail</span>
                            </a>
                            <button onclick="if (confirm('Hapus Data {{ $data -> siswa_nama }}')) { location.replace('/admin-area/riwayat/delete/{{ Crypt::encrypt($data -> transaksi_kode) }}') }" class="btn btn-danger btn-sm">
                                <i class="align-middle" data-feather="trash-2"></i>
                                <span class="align-middle">Hapus</span>
                            </button>
                            <a class="btn btn-sm btn-info" href="/admin-area/riwayat/print/{{ Crypt::encrypt($data -> transaksi_kode) }}">
                                <span class="align-middle">Print</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection