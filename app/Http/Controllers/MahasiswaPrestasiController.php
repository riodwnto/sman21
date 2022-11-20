<?php

namespace App\Http\Controllers;

use App\Database\Migrations\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\MahasiswaPrestasi;

class MahasiswaPrestasiController extends Controller
{
    public function achievement_submit(Request $request) {
        $img = $request->foto;

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->nrp_mhs.'.'.$imgext;
        } else {
            $imgname = 'default.png';
        }

        $request->merge([
            'pict' => $imgname,
            'name_slug' => MahasiswaPrestasi::generateSlug($request->nama),
        ]);

        $validated = $request->validate([
            'nrp_mhs' => 'required|unique:mahasiswa_prestasi|max:11|min:9',
            'nama' => 'required|max:150|unique:mahasiswa_prestasi',
            'pict' => 'required',
            'prestasi' => 'required',
            'name_slug' => 'required',
        ]);

        if ($imgname != 'default.png') {
            $img->move(public_path('/img/mhs/'), $imgname);
        }

        $query = MahasiswaPrestasi::insert($validated);

        if ($query == true) {
            return redirect('/admin-area/prestasi-akademik')->with('success', 'Berhasil menambahkan data prestasi akademik.');
        } else {
            return redirect('/admin-area/prestasi-akademik')->with('error', 'Terjadi kesalahan dalam menambahkan data prestasi akademik.');
        }
    }

    public function achievement_search(Request $request) {
        $url = $request->getPathInfo();

        if ($url == '/admin-area/prestasi-akademik') {
            $request->merge([
                'cari' => '%'.$request->cari.'%',
            ]);
    
            $validated = $request->validate([
                'cari' => 'required',
            ]);
    
            $query = MahasiswaPrestasi::where('nrp_mhs', 'like',$validated)->orWhere('nama', 'like', $validated)->paginate(8);

            if ($query == true) {
                if (count($query) == 0) {
                    return redirect()->back()->with('message', 'Data prestasi mahasiswa tidak ditemukan.');
                } else {
                    return view('admin.achievement', [
                        'title' => 'Hasil Pencarian : '.$request->judul,
                        'menu' => 'prestasi_akademik',
                        'mhs' => $query,
                    ]);
                }
            } else {
                return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
            }
        } else {
            $request->merge([
                'cari' => '%'.$request->judul.'%',
            ]);
    
            $validated = $request->validate([
                'cari' => 'required',
            ]);
    
            $query = MahasiswaPrestasi::where('nrp_mhs', 'like',$validated)->orWhere('nama', 'like', $validated)->paginate(8);
            
            if ($query == true) {
                if (count($query) == 0) {
                    return redirect()->back()->with('message', 'Data prestasi mahasiswa tidak ditemukan.');
                } else {
                    return view('main.blog', [
                        'title' => 'Hasil Pencarian : '.$request->judul,
                        'menu' => 'akademik',
                        'mhs' => $query,
                    ]);
                }
            } else {
                return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
            }
        }
    }

    public function achievement_edit($id) {
        $query = MahasiswaPrestasi::where('nrp_mhs', decrypt($id))->get();

        return view('admin.achievement_edit', [
            'title' => 'Edit Data Prestasi Mahasiswa',
            'menu' => 'prestasi_mahasiswa',
            'mhs' => $query,
        ]);
    }

    public function achievement_update(Request $request) {
        $check = MahasiswaPrestasi::where('nrp_mhs', '!=', $request->nrp_mhs)->get();
        $img = $request->foto;

        foreach ($check as $data) {
            if ($data -> nama == $request -> nama) {
                return redirect()->back()->with('error', 'Nama mahasiswa telah terdaftar.');
            }
        }
        
        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->nrp_mhs.'.'.$imgext;

            $request->merge([
                'pict' => $imgname,
                'name_slug' => MahasiswaPrestasi::generateSlug($request->nama)
            ]);
    
            $validated = $request->validate([
                'nama' => 'required|max:150',
                'pict' => 'required',
                'prestasi' => 'required',
                'name_slug' => 'required',
            ]);

            MahasiswaPrestasi::deleteImage($request->nrp_mhs);
            $img->move(public_path('/img/mhs/'), $imgname);

            $query = MahasiswaPrestasi::where('nrp_mhs', $request->nrp_mhs)->update($validated);
        } else {
            $request->merge([
                'name_slug' => MahasiswaPrestasi::generateSlug($request->nama)
            ]);

            $validated = $request->validate([
                'nama' => 'required|max:150',
                'prestasi' => 'required',
                'name_slug' => 'required',
            ]);

            $query = MahasiswaPrestasi::where('nrp_mhs', $request->nrp_mhs)->update($validated);
        }

        if ($query == true) {
            return redirect('/admin-area/prestasi-akademik')->with('success', 'Berhasil mengedit data prestasi.');
        } else {
            return redirect('/admin-area/prestasi-akademik')->with('error', 'Terjadi kesalahan dalam mengedit data prestasi.');
        }
    }

    public function achievement_delete($id) {
        MahasiswaPrestasi::deleteImage(decrypt($id));

        $query = MahasiswaPrestasi::destroy(decrypt($id));

		if ($query == true) {
            return redirect('/admin-area/prestasi-akademik')->with('success', 'Berhasil menghapus data prestasi akademik.');
        } else {
            return redirect('/admin-area/prestasi-akademik')->with('error', 'Terjadi kesalahan dalam menghapus data prestasi akademik.');
        }
	}
}
