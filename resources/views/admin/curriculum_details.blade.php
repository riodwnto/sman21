@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> / <a href="/admin-area/kurikulum" class="a-breadcrumbs">Data
                Kurikulum</a> / </span>Detail</h4>
    <div class="card">
        <h5 class="card-header">
            Data Kurikulum
        </h5>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input readonly type="text" name="kode_matkul" id="kode_matkul" class="form-control"
                            placeholder="Kode mata kuliah" maxlength="7" value="{{ $curriculum[0] -> kode_matkul }}" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input readonly type="text" name="nama" class="form-control" placeholder="Nama mata kuliah"
                            maxlength="100" value="{{ $curriculum[0] -> nama }}" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">SKS</label>
                        <input readonly type="text" name="sks" class="form-control" placeholder="Nama mata kuliah"
                            maxlength="100" value="{{ $curriculum[0] -> sks }}" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Semester</label>
                        <input readonly type="text" name="semester" class="form-control" placeholder="Nama mata kuliah"
                            maxlength="100" value="{{ $curriculum[0] -> semester }}" required>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea readonly class="form-control" name="keterangan" rows="5">{{ $curriculum[0] -> keterangan }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection