<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Siswa;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Session;

class TransaksiController extends Controller
{
    //
    public function index(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date   = date('Y-m-d');
        $today  = date('Ymd');
        $sql    = DB::table('transaksi')->max('transaksi_id');
        if ($sql == true) {
            $no_urut = $sql;
            $no_urut++;
            $id_transaksi = $today.sprintf('%04s',$no_urut);
          }else{
            $id_transaksi = "";
          }
        $tanggal_kembali        = date('Y-m-d', strtotime($date. ' + 3 days'));
    	$data['title']          = 'Transaksi Peminjaman';
        $data['menu']           = 'transaksi';
        $data['transaksi_id']   = $id_transaksi;
        $data['tanggal_pinjam'] = $date;
        $data['tanggal_kembali']= $tanggal_kembali;
        $data['siswa']          = Siswa::paginate(20);
        if($request->session()->has('cart')){
            foreach ($request->session()->get('cart') as $bukukode => $jumlah){
                $data['cart']      = Buku::getById($bukukode);   
                $data['jumlah']    = $jumlah;  
            }
        }
        return view('admin.transaksi', $data);
    }

    public function generateqr(Request $request){
        $buku_kode = $request->post('buku_kode');
        $session = $request->session();
        if (!empty($buku_kode)) {
            $data = $session->get('cart');
            if(!isset($data[$buku_kode])){
                $data[$buku_kode] = 0;
            }
            $data[$buku_kode] += 1;
            $session->put('cart', $data);
        } 
        return redirect('/admin-area/transaksi');
    }

    public function hapuskeranjang(Request $request, $id){
        $request->session()->forget('cart.'.$id);

        return redirect('/admin-area/transaksi');
    }

    public function checkout(Request $request, Transaksi $transaksi, DetailTransaksi $dt){
        $cek   = $transaksi::select('*')->where('transaksi_kode', '=', $request->transaksi_kode)->get();
        $row   = count($cek);
        if($row==0){
           $query = $transaksi::insert([
                    'transaksi_tanggalpinjam'       => $request->post('transaksi_tanggalpinjam'),
                    'transaksi_tanggalkembali'      => $request->post('transaksi_tanggalkembali'),
                    'transaksi_kode'                => $request->post('transaksi_kode'),
                    'transaksi_status'              => 'Dipinjam',
                    'transaksi_denda'               => '0',
                    'siswa_id'                      => $request->post('siswa_id'),
            ]);
            foreach ($request->session()->get('cart') as $bukukode => $jumlah){
                $cart              = Buku::getById($bukukode);   
                foreach($cart as $c){
                    $query2 = $dt::insert([
                            'transaksi_id'                  => $request->post('transaksi_kode'),
                            'buku_id'                       => $c->buku_kode,
                            'detailtransaksi_jumlah'        => $jumlah,
                            'detailtransaksi_tglpinjam'     => $request->post('transaksi_tanggalpinjam'),
                            'detailtransaksi_tglkembali'    => $request->post('transaksi_tanggalkembali'),
                            'detailtransaksi_status'        => 'Dipinjam'
                        ]);
                }
            }
            $request->session()->forget('cart');
            if($query && $query2){
                return redirect('/admin-area/transaksi')->with('success', 'Peminjaman Buku Berasil!.');
            }else{
                return redirect('/admin-area/transaksi')->with('error', 'Peminjaman Buku Gagal!');
            } 
        }else{
            return redirect('/admin-area/transaksi')->with('error', 'Peminjaman Buku Gagal Transaksi Kode Duplikat!');    
        }
        
    }

    public function riwayat(){
        $data   = [
        'riwayat'   => Transaksi::getAll(),
        'title'     => 'Data Riwayat Peminjaman',
        'menu'      => 'riwayat',
        ];
        
        return view('admin.riwayat', $data);
    }

    public function detailriwayat($id){
        $data   = [
        'transaksi' => Transaksi::getById(decrypt($id)),
        'riwayat'   => DetailTransaksi::getById(decrypt($id)),
        'id'        => decrypt($id),
        'title'     => 'Detail Riwayat Peminjaman',
        'menu'      => 'detail',
        ];
        
        return view('admin.detailriwayat', $data);   
    }

    public function kembalisemua($id){
        $query  = Transaksi::UpdateId(decrypt($id));
        $query2 = DetailTransaksi::UpdateId(decrypt($id)); 

        if ($query == true && $query2 == true) {
            return redirect('/admin-area/riwayat/detail/'.$id)->with('success', 'Berhasil Mengembalikan Buku!.');
        } else {
            return redirect('/admin-area/riwayat/detail/'.$id)->with('error', 'Terjadi kesalahan dalam mengembalikan buku.');
        }  
    }

    public function kembalikan($id, $id2){
        $query  = DetailTransaksi::UpdateIdDt(decrypt($id2));
        
        $sql    = DetailTransaksi::GetIdTr(decrypt($id));

        
        if(count($sql) == '0'){
            $query2 = Transaksi::UpdateId(decrypt($id));
        }

       

        if ($query == true) {
            return redirect('/admin-area/riwayat/detail/'.$id)->with('success', 'Berhasil Mengembalikan Buku!.');
        } else {
            return redirect('/admin-area/riwayat/detail/'.$id)->with('error', 'Terjadi kesalahan dalam mengembalikan buku.');
        } 
    }

    public function delete($id) {
      
        $query = Transaksi::where('transaksi_kode', decrypt($id))->delete();
        $query2 = DetailTransaksi::where('transaksi_id',decrypt($id))->delete();

        if ($query == true && $query2 == true) {
                return redirect('/admin-area/riwayat')->with('success', 'Berhasil menghapus data transaksi.');
        } else {
            return redirect('/admin-area/riwayat')->with('error', 'Terjadi kesalahan dalam menghapus data transaksi.');
        }
    }


    public function edit($id){
       $data = [
            'transaksi' => Transaksi::getById(decrypt($id)),
            'title'     => 'Data Transaksi',
            'menu'      => 'transaksi'
       ];        
       return view('admin.transaksi_edit', $data);
    }

    public function update(Request $request){
        $query = Transaksi::where('transaksi_kode', $request->transaksi_kode)->update(['transaksi_tanggalkembali' => $request->transaksi_tanggalkembali]);
        $query2 = DetailTransaksi::where('transaksi_id', $request->transaksi_kode)->update(['detailtransaksi_tglkembali' => $request->transaksi_tanggalkembali]);
        if ($query == true && $query2 == true) {
                return redirect('/admin-area/riwayat')->with('success', 'Berhasil melakukan perpanjangan peminjaman buku.');
        } else {
            return redirect('/admin-area/riwayat')->with('error', 'Terjadi kesalahan dalam perpanjangan peminjaman buku.');
        }
    }

    public function print($id){
        $data   = [
        'transaksi' => Transaksi::getById(decrypt($id)),
        'detail'   => DetailTransaksi::getById(decrypt($id)),
        'id'        => decrypt($id),
        'title'     => 'Detail Riwayat Peminjaman',
        'menu'      => 'detail',
        ];
        
        return view('admin.print', $data);   
    }
}

 
