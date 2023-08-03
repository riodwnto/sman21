<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenis;

class JenisController extends Controller
{
    //
    public function index()
    {
    	$data 	= [
    	'jenis'		=> Jenis::paginate(20),
    	'title' 	=> 'Data Jenis Buku',
    	'menu' 		=> 'jenis',
    	];
        
        return view('admin.jenis', $data);
    }

    public function jenis_new() {
        return view('admin.jenis_new', [
            'menu' => "jenis",
            'title' => 'Input Data Jenis Buku'
        ]);
    }

     public function jenis_insert(Request $request, Jenis $jenis) {
        $request->validate([
            'nama_jenis' => 'required'
        ]);
        
        $query = $jenis->fill($request->post())->save();
        if ($query == true) {
            return redirect('/admin-area/jenis')->with('success', 'Berhasil menambahkan data jenis buku.');
        } else {
            return redirect('/admin-area/jenis')->with('error', 'Terjadi kesalahan dalam menambahkan data jenis buku.');
        }
    }


    public function jenis_edit($id) {
        $jenis = Jenis::where('id_jenis', decrypt($id))->get();

            return view('admin.jenis_edit', [
                'title' => 'Edit Data Jenis Buku',
                'menu' => 'jenis',
                'jen' => $jenis,
                'jenis' => true
            ]);
        
    }


     public function jenis_update(Request $request) {
        $nama_jenis = $request->nama_jenis;
        
        $query = Jenis::where('id_jenis', $request->id_jenis)->update(['nama_jenis' => $nama_jenis]);

        if ($query == true) {
            return redirect('/admin-area/jenis')->with('success', 'Berhasil mengedit data jenis buku.');
        } else {
            return redirect('/admin-area/jenis')->with('error', 'Terjadi kesalahan dalam mengedit data jenis buku.');
        }
    }

    public function jenis_delete($id) {
      
        $query = Jenis::destroy(decrypt($id));

        if ($query == true) {
                return redirect('/admin-area/jenis')->with('success', 'Berhasil menghapus data jenis buku.');
        } else {
            return redirect('/admin-area/jenis')->with('error', 'Terjadi kesalahan dalam menghapus data jenis buku.');
        }
    }

}
