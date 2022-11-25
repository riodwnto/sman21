@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> /</span> Data Kurikulum</h4>
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-md-6">
                    Data Kurikulum
                    <a href="/admin-area/kurikulum/new" class="btn btn-primary btn-sm pl-4">Data Baru</a>
                </div>
                <div @if (count($curriculum) === 0 || Session::has('message')) hidden @endif class="col-md-6">
                    <div class="d-flex flex-row-reverse">
                        <div class="row mb-4">
                            <div class="col-auto">
                                <label for="cari" class="col-form-label">Cari Data</label>
                            </div>
                            <div class="col-auto">
                                <form action="/admin-area/kurikulum" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <input required type="text" id="cari" class="form-control" name="cari"
                                            placeholder="Masukkan keyword...">
                                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                                    </div>
                                    @error('judul')
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
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS/Semester/Sifat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($curriculum) === 0 || Session::has('message'))
                    <tr>
                        <td colspan="5" class="text-center">Tidak Ada Data!</td>
                    </tr>
                    @else
                    @foreach ($curriculum as $data)
                    <tr>
                        <th scope="row">{{ $loop -> iteration }}</th>
                        <td>{{ $data -> kode_matkul }}</td>
                        <td>{{ $data -> nama }}</td>
                        <td>{{ $data -> sks. '/' . $data -> semester . '/'}}@if ($data -> tipe == 'w') W @else P @endif</td>
                        <td>
                            <a class="btn btn-sm btn-secondary" href="/admin-area/kurikulum/detail/{{ Crypt::encrypt($data -> kode_matkul); }}">
                                <span class="align-middle">Detail</span>
                            </a>
                            <a class="btn btn-sm btn-primary" href="/admin-area/kurikulum/edit/{{ Crypt::encrypt($data -> kode_matkul) }}">
                                <span class="align-middle">Edit</span>
                            </a>
                            <button onclick="if (confirm('Hapus mata kuliah {{ $data -> nama }}')) { location.replace('/admin-area/kurikulum/delete/{{ Crypt::encrypt($data -> kode_matkul) }}') }" class="btn btn-danger btn-sm">
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
        {{ $curriculum->links('admin.layout.pagination') }}
        {{-- <div class="card-body">
            @if (count($curriculum) === 0 || Session::has('message'))
                <h5 class="card-header text-center">Data Tidak Ditemukan!</h5>
            @else
            @foreach ($curriculum as $data)
            <div class="col">
                <div class="border-custom">
                    <div class="float-right">
                        <a class="btn btn-sm btn-primary btn-custom-border"
                            href="/admin-area/kurikulum/edit/{{ encrypt($data -> id_kurikulum) }}">Edit</a>
                        <button
                            onclick="if (confirm('Hapus data kurikulum {{ $data -> id_kurikulum }}')) { location.replace('/admin-area/kurikulum/delete/{{ Crypt::encrypt($data -> id_kurikulum) }}') }"
                            class="btn btn-sm btn-custom-border btn-danger">
                            <i class="align-middle" data-feather="trash-2"></i>
                            <span class="align-middle">Hapus</span>
                        </button>
                    </div>
                    <hr>
                    {!! html_entity_decode($data -> data_kurikulum) !!}
                </div>
            </div>
            @endforeach
            @endif
        </div> --}}
    </div>
</div>
@endsection