<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Jenis;
use App\Models\Rak;

class BukuController extends Controller
{
    //
    public function index()
    {
    	$data 	= [
    	'buku'		=> Buku::getAll(),
    	'title' 	=> 'Data Buku',
    	'menu' 		=> 'buku',
    	];
        
        return view('admin.buku', $data);
    }

    public function buku_new() {
    	$jenis      = Jenis::paginate(5);
        $rak        = Rak::paginate(5);
        $buku_kode  = date('Ymd').substr(uniqid(rand()),0,8);
        return view('admin.buku_new', [
            'menu' => "buku",
            'title' => 'Input Data Buku',
            'jenis' => $jenis,
            'buku_kode' => $buku_kode,
            'rak' => $rak
        ]);
    }

    public function buku_insert(Request $request, Buku $buku) {
        $query = $buku->fill($request->post())->save();
        if ($query == true) {
            return redirect('/admin-area/buku')->with('success', 'Berhasil menambahkan data buku.');
        } else {
            return redirect('/admin-area/buku')->with('error', 'Terjadi kesalahan dalam menambahkan data buku.');
        }
    }

    public function buku_edit($id, $from) {
        $buku = Buku::getById(decrypt($id));
        $jenis = Jenis::paginate(5);
        $rak = Rak::paginate(5);
        //true = delete from profile details
        //false = delete from acc forms
        if ($from == true) {
            return view('admin.buku_edit', [
                'title' => 'Edit Data Buku',
                'menu' => 'buku',
                'buk' => $buku,
                'jenis' => $jenis,
                'rak' => $rak,
                'buku' => true
            ]);
        } else {
            return view('admin.buku_edit', [
                'title' => 'Edit Data Buku',
                'menu' => 'buku',
                'buk' => $buku,
                'jenis' => $jenis,
                'rak' => $rak,
                'buku' => false
            ]);
        }
    }

    public function buku_update(Request $request) {
        
        $query = Buku::where('buku_id', $request->buku_id)->update([
        	'buku_judul' 		=> $request->buku_judul,
			'buku_kode' 		=> $request->buku_kode,
			'buku_penulis' 		=> $request->buku_penulis,
			'buku_penerbit' 	=> $request->buku_penerbit,
			'buku_tahunterbit' 	=> $request->buku_tahunterbit,
			'buku_stok'		 	=> $request->buku_stok,
			'buku_sinopsis' 	=> $request->buku_sinopsis,
			'jenis_id' 			=> $request->jenis_id,
            'rak_id'             => $request->rak_id,
        	]);

        if ($query == true) {
            return redirect('/admin-area/buku')->with('success', 'Berhasil mengedit data buku.');
        } else {
            return redirect('/admin-area/buku')->with('error', 'Terjadi kesalahan dalam mengedit data buku.');
        }
    }

    public function buku_delete($id) {
      
        $query = Buku::destroy(decrypt($id));
        if ($query == true) {
                return redirect('/admin-area/buku')->with('success', 'Berhasil menghapus data buku.');
        } else {
            return redirect('/admin-area/buku')->with('error', 'Terjadi kesalahan dalam menghapus data buku.');
        }
    }
}


?>
