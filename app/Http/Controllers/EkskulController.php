<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekskul;

class EkskulController extends Controller
{
    public function ekskul_submit(Request $request) {        
        $img = $request->foto;
        $id_ekskul = Ekskul::generateID();

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$id_ekskul.'.'.$imgext;
        } else {
            $imgname = null;
        }

        $request->merge([
            'foto' => $imgname,
            'id_ekskul' => $id_ekskul
        ]);

        $ekskul = $request->validate([
            'id_ekskul' => 'required|unique:ekskul|max:10',
            'judul' => 'required|max:20',
            'foto' => 'required'
        ]);

        $ekskul['foto'] = $imgname;

        $img->move(public_path('/img'), $imgname);

        $query = Ekskul::insert($ekskul);

        if ($query == true) {
            return redirect('/admin-area/ekskul')->with('success', 'Berhasil menambahkan data ekstrakulikuler.');
        } else {
            return redirect('/admin-area/ekskul')->with('error', 'Terjadi kesalahan dalam menambahkan data ekstrakulikuler.');
        }
    }

    public function ekskul_edit($id) {
        //Get data from 4 table
        $ekskul = Ekskul::where('id_ekskul', decrypt($id))->get();

        //Send result to view 
        return view('admin.ekskul_edit', [
            'ekskul' => $ekskul,
            'title' => 'Edit Data Ekstrakulikuler',
            'menu' => 'ekskul'
        ]);
    }

    public function ekskul_delete($id) {
        Ekskul::deleteImage(decrypt($id));

        $query = Ekskul::where('id_ekskul', decrypt($id))->delete();

		if ($query == true) {
            return redirect('/admin-area/ekskul')->with('success', 'Berhasil menghapus data ekstrakulikuler.');
        } else {
            return redirect('/admin-area/ekskul')->with('error', 'Terjadi kesalahan dalam menghapus data ekstrakulikuler.');
        }
	}

    public function ekskul_update(Request $request) {        
        $img = $request->foto;

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->id_ekskul.'.'.$imgext;

            $request->merge([
                'foto' => $imgname,
            ]);
    
            $ekskul = $request->validate([
                'judul' => 'required|max:20',
                'foto' => 'required'
            ]);

            $ekskul['foto'] = $imgname;

            Ekskul::deleteImage($request->id_ekskul);
            $img->move(public_path('/img'), $imgname);

            $query = Guru::where('id_ekskul', $request->id_ekskul)->update($ekskul);
        } else {
            $ekskul = $request->validate([
                'judul' => 'required|max:20'
            ]);

            $query = Ekskul::where('id_ekskul', $request->id_ekskul)->update($ekskul);     
        }

        if ($query == true) {
            return redirect('/admin-area/ekskul')->with('success', 'Berhasil mengedit data ekstrakulikuler.');
        } else {
            return redirect('/admin-area/ekskul')->with('error', 'Terjadi kesalahan dalam mengedit data ekstrakulikuler.');
        }
    }

    public function ekskul_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = Ekskul::where('id_ekskul', 'like',$validated)->orWhere('judul', 'like',$validated)->paginate(8);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Data ekstrakulikuler tidak ditemukan.');
            } else {
                return view('admin.ekskul', [
                    'title' => 'Hasil Pencarian : '.$request->cari,
                    'menu' => 'ekskul',
                    'ekskul' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
        }
    }
}
