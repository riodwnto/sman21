<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TU;

class TUController extends Controller
{
    public function tu_submit(Request $request) {        
        $img = $request->foto;
        $id_tu = TU::generateID();

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$id_tu.'.'.$imgext;
        } else {
            $imgname = null;
        }

        $request->merge([
            'foto' => $imgname,
            'id_tu' => $id_tu
        ]);

        $tu = $request->validate([
            'id_tu' => 'required|unique:dirtu|max:10',
            'nip' => 'required|max:20',
            'nama' => 'required|max:70',
            'bagian' => 'required',
            'foto' => 'required'
        ]);

        $tu['foto'] = $imgname;

        $img->move(public_path('/img'), $imgname);

        $query = TU::insert($tu);

        if ($query == true) {
            return redirect('/admin-area/dirtu')->with('success', 'Berhasil menambahkan data tata usaha.');
        } else {
            return redirect('/admin-area/dirtu')->with('error', 'Terjadi kesalahan dalam menambahkan data tata usaha.');
        }
    }

    public function tu_edit($id) {
        //Get data from 4 table
        $tu = TU::where('id_tu', decrypt($id))->get();

        //Send result to view 
        return view('admin.tu_edit', [
            'tu' => $tu,
            'title' => 'Edit Data Tata Usaha',
            'menu' => 'tu'
        ]);
    }

    public function tu_delete($id) {
        TU::deleteImage(decrypt($id));

        $query = TU::where('id_tu', decrypt($id))->delete();

		if ($query == true) {
            return redirect('/admin-area/dirtu')->with('success', 'Berhasil menghapus data tata usaha.');
        } else {
            return redirect('/admin-area/dirtu')->with('error', 'Terjadi kesalahan dalam menghapus data tata usaha.');
        }
	}

    public function tu_update(Request $request) {        
        $img = $request->foto;

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->id_tu.'.'.$imgext;

            $request->merge([
                'foto' => $imgname,
            ]);
    
            $tu = $request->validate([
                'nip' => 'required|max:20',
                'nama' => 'required|max:70',
                'bagian' => 'required',
                'foto' => 'required'
            ]);

            $tu['foto'] = $imgname;

            TU::deleteImage($request->id_tu);
            $img->move(public_path('/img'), $imgname);

            $query = TU::where('id_tu', $request->id_tu)->update($tu);
        } else {
            $tu = $request->validate([
                'nip' => 'required|max:20',
                'nama' => 'required|max:70',
                'bagian' => 'required',
            ]);

            $query = TU::where('id_tu', $request->id_tu)->update($tu);     
        }

        if ($query == true) {
            return redirect('/admin-area/dirtu')->with('success', 'Berhasil mengedit data tata usaha.');
        } else {
            return redirect('/admin-area/dirtu')->with('error', 'Terjadi kesalahan dalam mengedit data tata usaha.');
        }
    }

    public function tu_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = TU::where('id_tu', 'like',$validated)->orWhere('nama', 'like',$validated)->orWhere('bagian', 'like',$validated)->paginate(8);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Data tata usaha tidak ditemukan.');
            } else {
                return view('admin.tu', [
                    'title' => 'Hasil Pencarian : '.$request->cari,
                    'menu' => 'tu',
                    'tu' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
        }
    }
}
