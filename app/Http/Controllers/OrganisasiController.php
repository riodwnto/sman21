<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    public function organization_edit($id) {
        $organization = Organisasi::where('id_struktur', decrypt($id))->get();

        return view('admin.organization_edit', [
            'title' => "Edit Data Organisasi",
            'organization' => $organization,
            'menu' => 'organisasi'
        ]);
    }    

    public function organization_submit(Request $request) {        
        $img = $request->foto;
        $imgext = $request->foto->extension();
        $imgname = time().'-'.Organisasi::generateID().'.'.$imgext;

        $request->merge([
            'id_struktur' => Organisasi::generateID(),
            'data_struktur' => $imgname,
        ]);

        $validated = $request->validate([
            'id_struktur' => 'required|unique:organisasi',
            'data_struktur' => 'required'
        ]);

        $img->move(public_path('/img/organization'), $imgname);

        $query = Organisasi::create($validated);

        if ($query == true) {
            return redirect('/admin-area/struktur-organisasi')->with('success', 'Berhasil menambahkan data struktur organisasi.');
        } else {
            return redirect('/admin-area/struktur-organisasi')->with('error', 'Terjadi kesalahan dalam menambahkan data struktur organisasi.');
        }
    }

    public function organization_update(Request $request) {        
        $img = $request->foto;

        if ($request->foto != null) {
            Organisasi::deleteImage($request->organization_id);
            
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->organization_id.'.'.$imgext;
        
            $request->merge([
                'data_struktur' => $imgname,
            ]);
    
            $validated = $request->validate([
                'data_struktur' => 'required'
            ]);

            $img->move(public_path('/img/organization'), $imgname);

            $query = Organisasi::where('id_struktur', $request->organization_id)->update([
                'data_struktur'    => $imgname,
            ]);

        }
        
        if ($query == true) {
            return redirect('/admin-area/struktur-organisasi')->with('success', 'Berhasil mengedit data struktur organisasi.');
        } else {
            return redirect('/admin-area/struktur-organisasi')->with('error', 'Terjadi kesalahan dalam mengedit data struktur organisasi.');
        }
    }

    public function organization_delete($id) {        
        Organisasi::deleteImage(decrypt($id));

        $query = Organisasi::destroy(decrypt($id));

        if ($query == true) {
            return redirect('/admin-area/struktur-organisasi')->with('success', 'Berhasil menghapus data struktur organisasi.');
        } else {
            return redirect('/admin-area/struktur-organisasi')->with('error', 'Terjadi kesalahan dalam menghapus data struktur organisasi.');
        }
    }
}
