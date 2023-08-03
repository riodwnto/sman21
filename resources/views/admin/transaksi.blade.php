@extends('admin.layout.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="/admin-area"
                class="a-breadcrumbs">Beranda</a> /</span> Data Transaksi</h4>
    @include('admin.layout.alert')
    <div class="card">
        <h5 class="card-header">
            Transaksi Peminjaman Buku
        </h5>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="card">
                <h6 class="card-header">Scan Buku Disini</h6>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                  <div id="reader" width="600px"></div>
                                </div>
                                <div class="col-md-12">
                                    <select id="pilihKamera" class="form-control"></select>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <form action="/admin-area/qrcode" method="post">
                                        @csrf
                                        <input name="buku_kode" id="text" class="form-control"  />
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h6 class="card-header">Detail Peminjaman</h6>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <td>No</td>
                                <td>Judul Buku</td>
                                <td>Qty</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($cart)){ ?>
                                <?php $no = 1;?>
                                <?php foreach ($cart as $c): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>{{$c->buku_judul}}</td>
                                        <td>{{$jumlah}}</td>
                                        <td>
                                            <a href="/admin-area/hapuskeranjang/{{$c->buku_kode}}">
                                                <i class="bx bx-trash text-danger"></i>
                                             </a>
                                        </td>
                                    </tr>    
                                <?php endforeach ?>
                            <?php }else{ ?>    
                                <tr>
                                    <td colspan="4" align="center">Silahkan Scan Buku</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
                <form action="/admin-area/checkout" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-form-label">Transaksi Kode</label>
                                        <input class="form-control" name="transaksi_kode" readonly value="{{$transaksi_id}}"></input>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-form-label">Tanggal Pinjam</label>
                                        <input class="form-control" name="transaksi_tanggalpinjam" readonly value="{{$tanggal_pinjam}}"></input>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-form-label">Tanggal Kembali</label>
                                        <input class="form-control" name="transaksi_tanggalkembali" readonly value="{{$tanggal_kembali}}"></input>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-form-label">Siswa</label>
                                        <select class="form-control theSelect" name="siswa_id" required>
                                            <option value="">-Pilih-</option>
                                            <?php foreach($siswa as $s): ?>
                                                 <option value="{{$s->siswa_id}}">{{$s->siswa_nama}}</option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 pull-right">
                                        <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary"></input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </form> 
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script type="text/javascript">
    function onScanSuccess(decodedText, decodedResult) {
      // handle the scanned code as you like, for example:
      console.log(`Code matched = ${decodedText}`, decodedResult);
    }

    function onScanFailure(error) {
      // handle scan failure, usually better to ignore and keep scanning.
      // for example:
      console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
      "reader",
      { fps: 10, qrbox: {width: 250, height: 250} },
      /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="{{ asset('assets/css/select.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/select.js') }}"></script>
<script type="text/javascript">
        $(".theSelect").select2();
</script>
@endsection