@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> /</span> Data Siswa</h4>
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <a href="/admin-area/siswa/new" class="btn btn-primary btn-sm pl-4">Data Baru</a>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-row-reverse">
                        <div class="row mb-4">
                            <div class="col-auto">
                                <label for="cari" class="col-form-label">Cari Siswa</label>
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
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Lahir</th>
                        <th>Gender</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($siswa) === 0 || Session::has('message'))
                    <tr>
                        <td colspan="7" class="text-center">Tidak Ada Data!</td>
                    </tr>
                    @else
                    @foreach ($siswa as $data)
                    <tr>
                        <th scope="row">{{ $loop -> iteration }}</th>
                        <td>{{ $data -> nisn }}</td>
                        <td>{{ $data -> siswa_nama }}</td>
                        <td>{{ $data -> siswa_ttl }}</td>
                        <td>{{ $data -> siswa_gender }}</td>
                        <td>{{ $data -> siswa_alamat }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="/admin-area/siswa/edit/{{ Crypt::encrypt($data -> siswa_id) }}">
                                <span class="align-middle">Edit</span>
                            </a>
                            <button onclick="if (confirm('Hapus Data {{ $data -> siswa_nama }}')) { location.replace('/admin-area/siswa/delete/{{ Crypt::encrypt($data -> siswa_id) }}') }" class="btn btn-danger btn-sm">
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
        {{ $siswa->links('admin.layout.pagination') }}
    </div>
</div>
@endsection