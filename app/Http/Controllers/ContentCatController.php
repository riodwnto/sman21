<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentCat;

class ContentCatController extends Controller
{
    //
    public function index()
    {
    	$data 	= [
    	'contentcat'    => ContentCat::get(),
    	'title' 	    => 'Data Content Category',
    	'menu' 		    => 'contentcat',
    	];
        
        return view('admin.contentcat', $data);
    }

    public function contentcat_new() {
        $data = [
            'menu' => 'contentcat',
            'title'=> 'Tambah Data Content Category Baru'
        ];
        return view('admin.contentcat_new', $data);
    }

    public function contentcat_insert(Request $request){
       $menu = new ContentCat([
            'contentcat_nama' => $request->contentcat_nama,
            'contentcat_status' => $request->contentcat_status
        ]);
        $menu->save();
        return redirect('/admin-area/contentcat')->with('success', 'Berhasil menambahkan data menu  .');
    }

    public function contentcat_edit($id) {
        $data  = [
            'contentcat' => ContentCat::find(decrypt($id)),
            'title' => 'Edit Content Category',
            'menu' => 'contentcat',
        ];

        return view('admin.contentcat_edit', $data);   
    }

    public function contentcat_update(Request $request) {
        $query = ContentCat::where('contentcat_id', $request->contentcat_id)->update([
        	'contentcat_nama'    => $request->contentcat_nama,
            'contentcat_status'  => $request->contentcat_status
        	]);

        if ($query == true) {
            return redirect('/admin-area/contentcat')->with('success', 'Berhasil mengubah data content category.');
        } else {
            return redirect('/admin-area/contentcat')->with('error', 'Terjadi kesalahan dalam mengubah data content category.');
        }
    }

    public function contentcat_delete($id) {
      
        $query = ContentCat::destroy(decrypt($id));

        if ($query == true) {
                return redirect('/admin-area/contentcat')->with('success', 'Berhasil menghapus data content category.');
        } else {
            return redirect('/admin-area/contentcat')->with('error', 'Terjadi kesalahan dalam menghapus data content category.');
        }
    }
}
