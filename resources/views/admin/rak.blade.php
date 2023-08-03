@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> /</span> Data Rak Buku</h4>
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <a href="/admin-area/rak/new" class="btn btn-primary btn-sm pl-4">Data Baru</a>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-row-reverse">
                        <div class="row mb-4">
                            <div class="col-auto">
                                <label for="cari" class="col-form-label">Cari Rak</label>
                              </div>
                              <div class="col-auto">
                                <form action="/admin-area/rak" method="POST" enctype="multipart/form-data">
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
                        <th>Nama Rak</th>
                        <th>Lokasi Rak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($rak) === 0 || Session::has('message'))
                    <tr>
                        <td colspan="4" class="text-center">Tidak Ada Data!</td>
                    </tr>
                    @else
                    @foreach ($rak as $data)
                    <tr>
                        <th scope="row">{{ $loop -> iteration }}</th>
                        <td>{{ $data -> rak_nama }}</td>
                        <td>{{ $data -> rak_lokasi }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="/admin-area/rak/edit/{{ Crypt::encrypt($data -> rak_id) }}">
                                <span class="align-middle">Edit</span>
                            </a>
                            <button onclick="if (confirm('Hapus Data {{ $data -> rak_nama }}')) { location.replace('/admin-area/rak/delete/{{ Crypt::encrypt($data -> rak_id) }}') }" class="btn btn-danger btn-sm">
                                <i class="align-middle" data-feather="trash-2"></i>
                                <span class="align-middle">Hapus</span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{ $rak->links('admin.layout.pagination') }}
    </div>
</div>
@endsection