<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kurikulum;

class KurikulumController extends Controller
{

    public function curriculum_submit(Request $request) {
        $request -> merge([
            'slug' => Kurikulum::generateSlug($request->nama),
        ]);

        $validated = $request->validate([
            'kode_matkul' => 'required|unique:kurikulum|max:7',
            'nama' => 'required|max:100|unique:kurikulum',
            'sks' => 'required',
            'semester' => 'required',
            'tipe' => 'required',
            'keterangan' => 'required',
            'slug' => 'required'
        ]);

        $query = Kurikulum::create($validated);

        if ($query == true) {
            return redirect('/admin-area/kurikulum')->with('success', 'Berhasil menyimpan data kurikulum.');
        } else {
            return redirect('/admin-area/kurikulum')->with('error', 'Terjadi kesalahan dalam menambahkan data kurikulum.');
        }
    }

    public function curriculum_details($id) {
        $curriculum = Kurikulum::where('kode_matkul', decrypt($id))->get();

        return view('admin.curriculum_details', [
            'title' => "Detail Mata Kuliah",
            'curriculum' => $curriculum,
            'menu' => 'kurikulum'
        ]);
    }

    public function curriculum_edit($id) {
        $curriculum = Kurikulum::where('kode_matkul', decrypt($id))->get();

        return view('admin.curriculum_edit', [
            'title' => "Edit Data Kurikulum",
            'curriculum' => $curriculum,
            'menu' => 'kurikulum'
        ]);
    }

    public function curriculum_update(Request $request) {
        $check = Kurikulum::where('kode_matkul', '!=', $request->kode_matkul)->get();

        foreach ($check as $data) {
            if ($data -> nama == $request -> nama) {
                return redirect()->back()->with('error', 'Nama mata kuliah tidak boleh sama.');
            }
        }

        $request -> merge([
            'slug' => Kurikulum::generateSlug($request->nama),
        ]);

        $validated = $request->validate([
            'nama' => 'required|max:100',
            'sks' => 'required',
            'semester' => 'required',
            'tipe' => 'required',
            'keterangan' => 'required',
            'slug' => 'required'
        ]);

        $query = Kurikulum::where('kode_matkul', $request -> kode_matkul)->update($validated);

        if ($query == true) {
            return redirect('/admin-area/kurikulum')->with('success', 'Berhasil mengedit data kurikulum.');
        } else {
            return redirect('/admin-area/kurikulum')->with('error', 'Terjadi kesalahan dalam menambahkan data kurikulum.');
        }
    }

    public function curriculum_delete($id) {
        $query = Kurikulum::destroy(decrypt($id));

        if ($query == true) {
            return redirect('/admin-area/kurikulum')->with('success', 'Berhasil menghapus data kurikulum.');
        } else {
            return redirect('/admin-area/kurikulum')->with('error', 'Terjadi kesalahan dalam menghapus data kurikulum.');
        }
    }

    public function curriculum_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = Kurikulum::where('nama', 'like', $validated)->orWhere('sks', 'like' , $validated)->orWhere('semester', 'like' , $validated)->orWhere('tipe', 'like' , $validated)->paginate(20);


        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Kurikulum tidak ditemukan.');
            } else {
                return view('admin.curriculum', [
                    'title' => 'Hasil Pencarian : '.$request->cari,
                    'menu' => 'kurikulum',
                    'curriculum' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian akun.');
        }
    }
}
