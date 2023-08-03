<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rak;

class RakController extends Controller
{
    //
    public function index()
    {
    	$data 	= [
    	'rak'		=> Rak::paginate(20),
    	'title' 	=> 'Data Rak Buku',
    	'menu' 		=> 'rak',
    	];
        
        return view('admin.rak', $data);
    }

    public function rak_new() {
        return view('admin.rak_new', [
            'menu' => "rak",
            'title' => 'Input Data Rak Buku'
        ]);
    }

     public function rak_insert(Request $request, Rak $rak) {
        $request->validate([
            'rak_nama' 		=> 'required',
            'rak_lokasi' 	=> 'required',
        ]);
        
        $query = $rak->fill($request->post())->save();
        if ($query == true) {
            return redirect('/admin-area/rak')->with('success', 'Berhasil menambahkan data rak buku.');
        } else {
            return redirect('/admin-area/rak')->with('error', 'Terjadi kesalahan dalam menambahkan data rak buku.');
        }
    }


    public function rak_edit($id) {
        $rak = Rak::where('rak_id', decrypt($id))->get();

            return view('admin.rak_edit', [
                'title' => 'Edit Data Rak Buku',
                'menu' => 'rak',
                'ra' => $rak,
                'rak' => true
            ]);
        
    }


     public function rak_update(Request $request) {
        $rak_nama = $request->rak_nama;
        $rak_lokasi = $request->rak_lokasi;
        
        $query = Rak::where('rak_id', $request->rak_id)->update(['rak_nama' => $rak_nama,'rak_lokasi' => $rak_lokasi]);

        if ($query == true) {
            return redirect('/admin-area/rak')->with('success', 'Berhasil mengedit data rak buku.');
        } else {
            return redirect('/admin-area/rak')->with('error', 'Terjadi kesalahan dalam mengedit data rak buku.');
        }
    }

    public function rak_delete($id) {
      
        $query = Rak::destroy(decrypt($id));

        if ($query == true) {
                return redirect('/admin-area/rak')->with('success', 'Berhasil menghapus data rak buku.');
        } else {
            return redirect('/admin-area/rak')->with('error', 'Terjadi kesalahan dalam menghapus data rak buku.');
        }
    }
}
