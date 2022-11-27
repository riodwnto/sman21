<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function guru_submit(Request $request) {        
        $img = $request->foto;
        $id_guru = Guru::generateID();

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$id_guru.'.'.$imgext;
        } else {
            $imgname = null;
        }

        $request->merge([
            'foto' => $imgname,
            'id_guru' => $id_guru
        ]);

        $guru = $request->validate([
            'id_guru' => 'required|unique:dirgu|max:10',
            'nip' => 'required|max:20',
            'nama' => 'required|max:70',
            'matpel' => 'required',
            'foto' => 'required'
        ]);

        $guru['foto'] = $imgname;

        $img->move(public_path('/img'), $imgname);

        $query = Guru::insert($guru);

        if ($query == true) {
            return redirect('/admin-area/dirgu')->with('success', 'Berhasil menambahkan data guru.');
        } else {
            return redirect('/admin-area/dirgu')->with('error', 'Terjadi kesalahan dalam menambahkan data guru.');
        }
    }

    public function guru_edit($id) {
        //Get data from 4 table
        $guru = Guru::where('id_guru', decrypt($id))->get();

        //Send result to view 
        return view('admin.guru_edit', [
            'guru' => $guru,
            'title' => 'Edit Data Guru',
            'menu' => 'guru'
        ]);
    }

    public function guru_delete($id) {
        Guru::deleteImage(decrypt($id));

        $query = Guru::where('id_guru', decrypt($id))->delete();

		if ($query == true) {
            return redirect('/admin-area/dirgu')->with('success', 'Berhasil menghapus data guru.');
        } else {
            return redirect('/admin-area/dirgu')->with('error', 'Terjadi kesalahan dalam menghapus data guru.');
        }
	}

    public function guru_update(Request $request) {        
        $img = $request->foto;

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->id_guru.'.'.$imgext;

            $request->merge([
                'foto' => $imgname,
            ]);
    
            $guru = $request->validate([
                'nip' => 'required|max:20',
                'nama' => 'required|max:70',
                'matpel' => 'required',
                'foto' => 'required'
            ]);

            $guru['foto'] = $imgname;

            Guru::deleteImage($request->id_guru);
            $img->move(public_path('/img'), $imgname);

            $query = Guru::where('id_guru', $request->id_guru)->update($guru);
        } else {
            $guru = $request->validate([
                'nip' => 'required|max:20',
                'nama' => 'required|max:70',
                'matpel' => 'required',
            ]);

            $query = Guru::where('id_guru', $request->id_guru)->update($guru);     
        }

        if ($query == true) {
            return redirect('/admin-area/dirgu')->with('success', 'Berhasil mengedit data guru.');
        } else {
            return redirect('/admin-area/dirgu')->with('error', 'Terjadi kesalahan dalam mengedit data guru.');
        }
    }

    public function guru_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = Guru::where('id_guru', 'like',$validated)->orWhere('nama', 'like',$validated)->orWhere('matpel', 'like',$validated)->paginate(8);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Data guru tidak ditemukan.');
            } else {
                return view('admin.guru', [
                    'title' => 'Hasil Pencarian : '.$request->cari,
                    'menu' => 'guru',
                    'guru' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
        }
    }
}
