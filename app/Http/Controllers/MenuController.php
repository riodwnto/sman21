<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index()
    {
    	$data 	= [
    	'menu_data'		=> Menu::get(),
    	'title' 	=> 'Data Master Menu',
    	'menu' 		=> 'menu',
    	];
        
        return view('admin.menu', $data);
    }
    public function menu_new() {
        $data = [
            'menu' => 'menu',
            'title'=> 'Tambah Data Menu Baru'
        ];
        return view('admin.menu_new', $data);
    }

    public function menu_insert(Request $request){
       $menu = new Menu([
            'menu_nama' => $request->menu_nama,
            'menu_title_page' => $request->menu_title_page,
            'menu_url' => $request->menu_url,
            'menu_target' => $request->menu_target,
            'menu_status' => $request->menu_status
        ]);
        $menu->save();
        return redirect('/admin-area/menu-master')->with('success', 'Berhasil menambahkan data menu  .');
    }
    public function menu_edit($id) {
        $data  = [
            'menu_data' => Menu::find(decrypt($id)),
            'title' => 'Edit Data Siswa',
            'menu' => 'menu',
        ];

        return view('admin.menu_edit', $data);
        
    }
    public function menu_update(Request $request) {
        $query = Menu::where('menu_id', $request->menu_id)->update([
        	'menu_nama'         => $request->menu_nama,
        	'menu_title_page' 	=> $request->menu_title_page,
        	'menu_url' 	        => $request->menu_url,
        	'menu_target' 	    => $request->menu_target,
        	'menu_status' 	    => $request->menu_status
        	]);

        if ($query == true) {
            return redirect('/admin-area/menu-master')->with('success', 'Berhasil mengubah data menu.');
        } else {
            return redirect('/admin-area/menu-master')->with('error', 'Terjadi kesalahan dalam mengubah data menu.');
        }
    }
    public function menu_delete($id) {
      
        $query = Menu::destroy(decrypt($id));

        if ($query == true) {
                return redirect('/admin-area/menu-master')->with('success', 'Berhasil menghapus data menu.');
        } else {
            return redirect('/admin-area/menu-master')->with('error', 'Terjadi kesalahan dalam menghapus data menu.');
        }
    }
}
