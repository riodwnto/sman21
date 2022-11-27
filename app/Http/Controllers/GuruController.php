<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function lecturer_submit(Request $request) {        
        $img = $request->foto;

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->nidn.'.'.$imgext;
        } else {
            $imgname = null;
        }

        $request->merge([
            'images' => $imgname,
        ]);

        $dosen = $request->validate([
            'nidn' => 'required|unique:dosen|max:15',
            'nama_dosen' => 'required|max:70',
            'keahlian' => 'required',
            'matkul' => 'required',
            'images' => 'required'
        ]);

        $pd_dosen = $request->validate([
            'nidn' => 'required|unique:dosen|max:15',
            's1' => 'nullable|max:150',
            's2' => 'nullable|max:150',
            's3' => 'nullable|max:150',
        ]);

        $pub_dosen = $request->validate([
            'nidn' => 'required|unique:dosen|max:15',
            'data_publikasi' => 'nullable',
        ]);

        $ref_dosen = $request->validate([
            'nidn' => 'required|unique:dosen|max:15',
            'google_scholar' => 'nullable|max:50',
            'shinta' => 'nullable|max:50',
            'scopus' => 'nullable|max:50',
        ]);

        $img->move(public_path('/img'), $imgname);

        $query = Dosen::insert($dosen);
        $query1 = Dosen::pendidikan_dosen()->insert($pd_dosen);
        $query2 = Dosen::publikasi_dosen()->insert($pub_dosen);
        $query3 = Dosen::referensi_dosen()->insert($ref_dosen);

        if (($query == true) && ($query1 == true) && ($query2 == true) && ($query3 == true)) {
            return redirect('/admin-area/dosen-pengajar')->with('success', 'Berhasil menambahkan data dosen.');
        } else {
            return redirect('/admin-area/dosen-pengajar')->with('error', 'Terjadi kesalahan dalam menambahkan data dosen.');
        }
    }

    public function lecturer_edit($id) {
        //Get data from 4 table
        $lecturer = Dosen::where('nidn', decrypt($id))->get();
        $lecturer_degree = Dosen::pendidikan_dosen()->where('nidn', decrypt($id))->get();
        $lecturer_publication = Dosen::publikasi_dosen()->where('nidn', decrypt($id))->get();
        $lecturer_reference = Dosen::referensi_dosen()->where('nidn', decrypt($id))->get();

        //Send result to view 
        return view('admin.lecturer_edit', [
            'lecturer' => $lecturer,
            'lecturer_degree' => $lecturer_degree,
            'lecturer_publication' => $lecturer_publication,
            'lecturer_reference' => $lecturer_reference,
            'title' => 'Edit Data Dosen',
            'menu' => 'dosen'
        ]);
    }

    public function lecturer_delete($id) {
        Dosen::deleteImage(decrypt($id));

        $query = Dosen::referensi_dosen()->where('nidn', decrypt($id))->delete();
        $query1 = Dosen::publikasi_dosen()->where('nidn', decrypt($id))->delete();
        $query2 = Dosen::pendidikan_dosen()->where('nidn', decrypt($id))->delete();
        $query3 = Dosen::where('nidn', decrypt($id))->delete();

		if (($query == true) && ($query1 == true) && ($query2 == true) && ($query3 == true)) {
            return redirect('/admin-area/dosen-pengajar')->with('success', 'Berhasil menghapus data dosen.');
        } else {
            return redirect('/admin-area/dosen-pengajar')->with('error', 'Terjadi kesalahan dalam menghapus data dosen.');
        }
	}

    public function lecturer_update(Request $request) {        
        $img = $request->foto;

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->nidn.'.'.$imgext;

            $request->merge([
                'images' => $imgname,
            ]);
    
            $dosen = $request->validate([
                'nama_dosen' => 'required|max:70',
                'keahlian' => 'required',
                'matkul' => 'required',
                'images' => 'required'
            ]);
    
            $pd_dosen = $request->validate([
                's1' => 'nullable|max:150',
                's2' => 'nullable|max:150',
                's3' => 'nullable|max:150',
            ]);
    
            $pub_dosen = $request->validate([
                'data_publikasi' => 'nullable',
            ]);
    
            $ref_dosen = $request->validate([
                'google_scholar' => 'nullable|max:50',
                'shinta' => 'nullable|max:50',
                'scopus' => 'nullable|max:50',
            ]);

            Dosen::deleteImage($request->nidn);
            $img->move(public_path('/img'), $imgname);

            $query = Dosen::where('nidn', $request->nidn)->update($dosen);
            $query1 = Dosen::pendidikan_dosen()->where('nidn', $request->nidn)->update($pd_dosen);
            $query2 = Dosen::publikasi_dosen()->where('nidn', $request->nidn)->update($pub_dosen);
            $query3 = Dosen::referensi_dosen()->where('nidn', $request->nidn)->update($ref_dosen);
        } else {
            $dosen = $request->validate([
                'nama_dosen' => 'required|max:70',
                'keahlian' => 'required',
                'matkul' => 'required'
            ]);
    
            $pd_dosen = $request->validate([
                's1' => 'nullable|max:150',
                's2' => 'nullable|max:150',
                's3' => 'nullable|max:150',
            ]);
    
            $pub_dosen = $request->validate([
                'data_publikasi' => 'nullable',
            ]);
    
            $ref_dosen = $request->validate([
                'google_scholar' => 'nullable|max:50',
                'shinta' => 'nullable|max:50',
                'scopus' => 'nullable|max:50',
            ]);

            $query = Dosen::where('nidn', $request->nidn)->update($dosen);       
            $query1 = Dosen::pendidikan_dosen()->where('nidn', $request->nidn)->update($pd_dosen);
            $query2 = Dosen::publikasi_dosen()->where('nidn', $request->nidn)->update($pub_dosen);
            $query3 = Dosen::referensi_dosen()->where('nidn', $request->nidn)->update($ref_dosen);
        }

        if (($query == true) || ($query1 == true) || ($query2 == true) || ($query3 == true)) {
            return redirect('/admin-area/dosen-pengajar')->with('success', 'Berhasil mengedit data dosen.');
        } else {
            return redirect('/admin-area/dosen-pengajar')->with('error', 'Terjadi kesalahan dalam mengedit data dosen.');
        }
    }

    public function lecturer_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = Dosen::vdosen()->where('nidn', 'like',$validated)->orWhere('nama_dosen', 'like',$validated)->orWhere('keahlian', 'like',$validated)->paginate(8);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Data dosen tidak ditemukan.');
            } else {
                return view('admin.lecturer', [
                    'title' => 'Hasil Pencarian : '.$request->cari,
                    'menu' => 'dosen',
                    'dosen' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
        }
    }
}
