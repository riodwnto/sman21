<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    //
     public function index()
    {
    	$data 	= [
    	'siswa'		=> Siswa::paginate(20),
    	'title' 	=> 'Data Siswa',
    	'menu' 		=> 'siswa',
    	];
        
        return view('admin.siswa', $data);
    }

    public function siswa_new() {
        return view('admin.siswa_new', [
            'menu' => "siswa",
            'title' => 'Input Data Siswa'
        ]);
    }

     public function siswa_insert(Request $request, Siswa $siswa) {
        $query = $siswa->fill($request->post())->save();
        if ($query == true) {
            return redirect('/admin-area/siswa')->with('success', 'Berhasil menambahkan data siswa .');
        } else {
            return redirect('/admin-area/siswa')->with('error', 'Terjadi kesalahan dalam menambahkan data siswa.');
        }
    }


    public function siswa_edit($id) {
        $siswa = Siswa::where('siswa_id', decrypt($id))->get();

            return view('admin.siswa_edit', [
                'title' => 'Edit Data Siswa',
                'menu' => 'siswa',
                'sis' => $siswa,
                'siswa' => true
            ]);
        
    }


     public function siswa_update(Request $request) {
        $query = siswa::where('siswa_id', $request->siswa_id)->update([
        	'nisn' 			=> $request->nisn,
        	'siswa_nama' 	=> $request->siswa_nama,
        	'siswa_ttl' 	=> $request->siswa_ttl,
        	'siswa_gender' 	=> $request->siswa_gender,
        	'siswa_alamat' 	=> $request->siswa_alamat
        	]);

        if ($query == true) {
            return redirect('/admin-area/siswa')->with('success', 'Berhasil mengedit data siswa buku.');
        } else {
            return redirect('/admin-area/siswa')->with('error', 'Terjadi kesalahan dalam mengedit data siswa buku.');
        }
    }

    public function siswa_delete($id) {
      
        $query = Siswa::destroy(decrypt($id));

        if ($query == true) {
                return redirect('/admin-area/siswa')->with('success', 'Berhasil menghapus data siswa buku.');
        } else {
            return redirect('/admin-area/siswa')->with('error', 'Terjadi kesalahan dalam menghapus data siswa buku.');
        }
    }
}
