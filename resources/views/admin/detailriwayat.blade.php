@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row py-3 mb-4">
        <div class="col-md-6">
            <h4 class="fw-bold ">
                <span class="text-muted fw-light">
                    <a href="/admin-area" class="a-breadcrumbs">Beranda</a>/
                </span> 
                Detail Riwayat
            </h4>    
        </div>
        <div class="col-md-6">
          <div class="btn-group float-end">
              <button type="button" class="btn btn-outline-danger btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="menu-icon tf-icons bx bx-cog"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/admin-area/riwayat/kembalisemua/{{ Crypt::encrypt($id) }}">Kembalikan Semua</a></li>
              </ul>
            </div>
        </div>
    </div>
    
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <?php foreach ($transaksi as $t ): ?>    
                        <div class="row mb-2">    
                            <div class="col-md-6"> Kode </div>
                            <div class="col-md-6"> : {{$t->transaksi_kode}} </div>
                        </div>
                        <div class="row mb-2">    
                            <div class="col-md-6"> Siswa </div>
                            <div class="col-md-6"> : {{$t->siswa_nama}} </div>
                        </div>
                        <div class="row mb-2">    
                            <div class="col-md-6"> Tanggal Pinjam </div>
                            <div class="col-md-6"> : {{$t->transaksi_tanggalpinjam}} </div>
                        </div>
                        <div class="row mb-2">    
                            <div class="col-md-6"> Tanggal Kembali</div>
                            <div class="col-md-6"> : {{$t->transaksi_tanggalkembali}} </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-row-reverse">
                        <div class="row mb-4">
                            <div class="col-auto">
                                <label for="cari" class="col-form-label">Cari Detail</label>
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
                        <th>Buku</th>
                        <th width="1%" align="center">Jumlah</th>
                        <th>#</th>
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
                        <td>{{ $data -> buku_judul }}</td>
                        <td>{{ $data -> detailtransaksi_jumlah }}</td>
                        <td width="1%" align="center">
                            <?php if ($data->detailtransaksi_status == 'Dipinjam'){ ?>
                                <a class="btn btn-sm btn-primary" href="/admin-area/riwayat/kembalikan/{{ Crypt::encrypt($data -> transaksi_kode) }}/{{ Crypt::encrypt($data -> detailtransaksi_id) }}">
                                    <span class="align-middle">Kembalikan</span>
                                </a>
                            <?php }else{?>
                                <span class="text-outline-danger">Dikembalikan</span>
                            <?php } ?>
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