@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> /</span> Data Organisasi</h4>
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            Data Organisasi
            <a href="/admin-area/struktur-organisasi/new" class="btn btn-primary btn-sm pl-4">Data Baru</a>
        </h5>
        <div class="card-body">
          <div class="row">
              @foreach ($organization as $data)
              <div class="col-lg-3 col-md-4 col-sm-12">
                  <div class="card bg-dark border-0 text-white">
                      <img class="card-img" id="imgSrc" src="{{ asset('img/organization/'.$data->data_struktur) }}"
                          alt="Card image" />
                      <div class="card-img-overlay">
                          <div class="row">
                              <div class="col-12">
                                  <h5 class="card-title">{{ $data -> id_struktur }}</h5>
                              </div>
                              <div class="col-12">
                                  <div class="card-text">
                                      <!--<button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                          data-bs-target="#imgModal" onclick="showImgModal()">
                                          Lihat
                                      </button>-->
                                      <a class="btn btn-sm btn-primary"
                                          href="/admin-area/struktur-organisasi/edit/{{ Crypt::encrypt($data -> id_struktur) }}">Edit</a>
                                          <button onclick="if (confirm('Hapus data {{ $data -> id_struktur }}')) { location.replace('/admin-area/struktur-organisasi/delete/{{ Crypt::encrypt($data -> id_struktur) }}') }" class="btn btn-sm btn-danger">
                                            <i class="align-middle" data-feather="trash-2"></i>
                                            <span class="align-middle">Hapus</span>
                                        </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src="" alt="" id="dataImgModal">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection