@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area" class="a-breadcrumbs">Beranda</a> /</span> Data Ekstrakuliler</h4>
    @include('admin.layout.alert')
    <!-- Examples -->
    <div class="row">
        <div class="col-md-6">
            <a href="/admin-area/ekskul/new" class="btn btn-primary btn-sm pl-4">Data Baru</a>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-row-reverse">
                <div class="row mb-4">
                    <div class="col-auto">
                        <label for="cari" class="col-form-label">Cari Ekstrakulikuler</label>
                    </div>
                    <div class="col-auto">
                        <form action="/admin-area/ekskul" method="POST" enctype="multipart/form-data">
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
    <div class="row mb-5">
        @if (count($ekskul) === 0 || Session::has('message')) 
        <div class="card mb-4 text-center">
            <h5 class="card-header">Data Tidak Ditemukan!</h5>
        </div>
        @else 
        @foreach ($ekskul as $data)
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('img/'.$data -> foto) }}" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">{{ $data -> judul }}</h5>
                    {{-- <p class="card-text">
                        {{ $data -> nip }}
                    </p>
                    <p class="card-text">
                        {!! $data -> bagian !!}
                    </p> --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="text-start">
                                <p class="card-text">Aksi</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <div class="btn-group btn-group-sm mb-4 text-right" role="group"
                                    aria-label="Small button group">
                                    <a href="/admin-area/ekskul/edit/{{ Crypt::encrypt($data -> id_ekskul) }}" class="btn btn-primary">
                                        <i class="align-middle" data-feather="edit"></i>
                                        <span class="align-middle">Edit</span>
                                    </a>
                                    <button onclick="if (confirm('Hapus data {{ $data -> judul }}')) { location.replace('/admin-area/ekskul/delete/{{ Crypt::encrypt($data -> id_ekskul) }}') }" class="btn btn-danger">
                                        <i class="align-middle" data-feather="trash-2"></i>
                                        <span class="align-middle">Hapus</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{ $ekskul->links('admin.layout.pagination') }}
        @endif
    </div>
    <!-- Examples -->
</div>
@endsection