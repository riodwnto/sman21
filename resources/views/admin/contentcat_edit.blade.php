@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/contentcat" class="a-breadcrumbs">{{$title}}</a></h4>
    <div class="card">
        <h5 class="card-header">
            {{$title}}
        </h5>
        <form action="/admin-area/contentcat/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                         <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Nama</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="contentcat_nama" required value="{{$contentcat->contentcat_nama}}"/>
                                <input class="form-control" type="hidden" name="contentcat_id" required value="{{$contentcat->contentcat_id}}"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <select name="contentcat_status" required class="form-control">
                                    <option value="{{$contentcat->contentcat_status}}">{{$contentcat->contentcat_status}}</option>
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
                            <a class="btn btn-warning" href="/admin-area/contentcat">
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