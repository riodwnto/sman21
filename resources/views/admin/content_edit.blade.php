@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/content" class="a-breadcrumbs">{{$title}}</a></h4>
    <div class="card">
        <h5 class="card-header">
            {{$title}}
        </h5>
        <form action="/admin-area/content/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                         <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Image</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="content_img" required value="{{$content->content_img}}"/>
                                <input class="form-control" type="hidden" name="content_id" required value="{{$content->content_id}}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Judul</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="content_judul" required value="{{ $content->content_judul }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Deskripsi</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="content_deskripsi" required value="{{ $content->content_deskripsi }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Kategori</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="content_kategori" required value="{{ $content->content_kategori }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">URL</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="content_url" required value="{{ $content->content_url }}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <select name="content_status" required class="form-control">
                                    <option value="{{$content->content_status}}">{{$content->content_status}}</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non-Aktif">Non-Aktif</option>
                                </select>
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
                            <a class="btn btn-warning" href="/admin-area/content">
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