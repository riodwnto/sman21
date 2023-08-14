@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> /</span> {{$title}}</h4>
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <a href="/admin-area/content/new" class="btn btn-primary btn-sm pl-4">Data Baru</a>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-row-reverse">
                        <div class="row mb-4">
                            <div class="col-auto">
                                <label for="cari" class="col-form-label">Cari Content</label>
                              </div>
                              <div class="col-auto">
                                <form action="/admin-area/content" method="POST" enctype="multipart/form-data">
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
                        <th>Image</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($content) === 0 || Session::has('message'))
                    <tr>
                        <td colspan="7" class="text-center">Tidak Ada Data!</td>
                    </tr>
                    @else
                    @foreach ($content as $data)
                    <tr>
                        <th scope="row">{{ $loop -> iteration }}</th>
                        <td>{{ $data -> content_img }}</td>
                        <td>{{ $data -> content_judul }}</td>
                        <td>{{ $data -> content_deskripsi }}</td>
                        <td>{{ $data -> content_kategori }}</td>
                        <td>{{ $data -> content_url }}</td>
                        <td>{{ $data -> content_status }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="/admin-area/content/edit/{{ Crypt::encrypt($data -> content_id) }}">
                                <span class="align-middle">Edit</span>
                            </a>
                            <button onclick="if (confirm('Hapus Data {{ $data -> content_judul }}')) { location.replace('/admin-area/content/delete/{{ Crypt::encrypt($data -> content_id) }}') }" class="btn btn-danger btn-sm">
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
        
    </div>
</div>
@endsection