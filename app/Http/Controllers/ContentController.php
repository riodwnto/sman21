<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //
    public function index()
    {
    	$data 	= [
    	'content'		=> Content::get(),
    	'title' 	=> 'Data Content',
    	'menu' 		=> 'content',
    	];
        
        return view('admin.content', $data);
    }

    public function content_new() {
        $data = [
            'menu' => 'content',
            'title'=> 'Tambah Data Content Baru'
        ];
        return view('admin.content_new', $data);
    }

    public function content_insert(Request $request){
       $menu = new Content([
            'content_img' => $request->content_img,
            'content_judul' => $request->content_judul,
            'content_deskripsi' => $request->content_deskripsi,
            'content_kategori' => $request->content_kategori,
            'content_url' => $request->content_url,
            'content_status' => $request->content_status
        ]);
        $menu->save();
        return redirect('/admin-area/content')->with('success', 'Berhasil menambahkan data menu  .');
    }

    public function content_edit($id) {
        $data  = [
            'content' => Content::find(decrypt($id)),
            'title' => 'Edit Content',
            'menu' => 'content',
        ];

        return view('admin.content_edit', $data);   
    }

    public function content_update(Request $request) {
        $query = Content::where('content_id', $request->content_id)->update([
        	'content_img'       => $request->content_img,
            'content_judul'     => $request->content_judul,
            'content_deskripsi' => $request->content_deskripsi,
            'content_kategori'  => $request->content_kategori,
            'content_url'       => $request->content_url,
            'content_status'    => $request->content_status
        	]);

        if ($query == true) {
            return redirect('/admin-area/content')->with('success', 'Berhasil mengubah data content.');
        } else {
            return redirect('/admin-area/content')->with('error', 'Terjadi kesalahan dalam mengubah data content.');
        }
    }

    public function content_delete($id) {
      
        $query = Content::destroy(decrypt($id));

        if ($query == true) {
                return redirect('/admin-area/content')->with('success', 'Berhasil menghapus data content.');
        } else {
            return redirect('/admin-area/content')->with('error', 'Terjadi kesalahan dalam menghapus data content.');
        }
    }
}
