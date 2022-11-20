<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function gallery_submit(Request $request) {
        $img = $request->foto;
        $imgext = $request->foto->extension();
        $imgname = time().'-'.Galeri::galleryGenerateID().'.'.$imgext;

        $request->merge([
            'images' => $imgname,
            'id_galeri' => Galeri::galleryGenerateID(),
        ]);

        //Not makeing new category, directly add data to gallery
        if (is_null($request->kategori_new)) {
            $validated = $request->validate([
                'id_galeri' => 'required|unique:galeri',
                'id_kategori' => 'required',
                'judul' => 'required|max:100',
                'deskripsi' => 'required|max:300',
                'images' => 'required',
            ]);

            $query = Galeri::insert($validated);
        } else {
            $id = Galeri::categoryGenerateID();
            $request->merge([
                'id_kategori' => $id,
                'nama_kategori' => $request->kategori_new,
            ]);

            $validated = $request->validate([
                'id_kategori' => 'required|unique:kategori',
                'nama_kategori' => 'required|min:3|max:30|unique:kategori',
            ]);

            $query1 = Galeri::kategori()->insert($validated);

            if ($query1 == true) {
                $request->merge([
                    'id_kategori' => $id,
                ]);

                $validated = $request->validate([
                    'id_galeri' => 'required|unique:galeri',
                    'id_kategori' => 'required',
                    'judul' => 'required|max:100',
                    'deskripsi' => 'required|max:300',
                    'images' => 'required',
                ]);

                $query = Galeri::insert($validated);
            } 
        }

        $img->move(public_path('/img/gallery'), $imgname);

        if ($query == true) {
            return redirect('/admin-area/galeri')->with('success', 'Berhasil mengunggah foto.');
        } else {
            return redirect('/admin-area/galeri')->with('error', 'Terjadi kesalahan dalam mengunggah foto.');
        }
    }

    public function gallery_edit($id) {
        //Get data
		$gallery = Galeri::vgaleri()->where('id_galeri', decrypt($id))->get();
        $category = Galeri::kategori()->get();

		//Send result to view 
		return view('admin.gallery_edit', [
            'gallery' => $gallery,
            'category' => $category,
            'title' => 'Edit Foto',
            'menu' => 'galeri'
        ]);
    }

    public function gallery_update(Request $request) {
        $img = $request->foto;

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->id_galeri.'.'.$imgext;

            $request->merge([
                'images' => $imgname,
            ]);

            $validated = $request->validate([
                'id_kategori' => 'required',
                'judul' => 'required|max:100',
                'deskripsi' => 'required|max:300',
                'images' => 'required',
            ]);
            
            Galeri::deleteImage($request->id_galeri);
            
            $query = Galeri::where('id_galeri', $request->id_galeri)->update($validated);

            $img->move(public_path('/img/gallery'), $imgname);
        } else {
            $validated = $request->validate([
                'id_kategori' => 'required',
                'judul' => 'required|max:100',
                'deskripsi' => 'required|max:300'
            ]);

            $query = Galeri::where('id_galeri', $request->id_galeri)->update($validated);
        }

        if ($query == true) {
            return redirect('/admin-area/galeri')->with('success', 'Berhasil mengedit foto.');
        } else {
            return redirect('/admin-area/galeri')->with('error', 'Terjadi kesalahan dalam mengedit foto.');
        }
    }

    public function gallery_delete($id) {
        Galeri::deleteImage(decrypt($id));

        $query = Galeri::destroy(decrypt($id));

		if ($query == true) {
            return redirect('/admin-area/galeri')->with('success', 'Berhasil menghapus foto.');
        } else {
            return redirect('/admin-area/galeri')->with('error', 'Terjadi kesalahan dalam menghapus foto.');
        }
	}

    public function gallery_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = Galeri::vgaleri()->where('nama_kategori', 'like',$validated)->orWhere('judul', 'like',$validated)->orWhere('id_galeri', 'like',$validated)->paginate(8);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Data galeri tidak ditemukan.');
            } else {
                return view('admin.gallery', [
                    'title' => 'Hasil Pencarian : '.$request->cari,
                    'menu' => 'galeri',
                    'gallery' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
        }
    }

    public function gallery_category_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = Galeri::kategori()->where('nama_kategori', 'like',$validated)->orWhere('id_kategori', 'like',$validated)->paginate(20);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Data kategori tidak ditemukan.');
            } else {
                return view('admin.gallery_category', [
                    'title' => 'Hasil Pencarian : '.$request->cari,
                    'menu' => 'kategori',
                    'category' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
        }
    }

    public function gallery_category_details($id) {
        $category = Galeri::kategori()->where('id_kategori', decrypt($id))->get();
        $gallery = Galeri::where('id_kategori', decrypt($id))->paginate(8);

        return view('admin.gallery_category_details', [
            'title' => 'Detail Kategori',
            'category' => $category,
            'gallery' => $gallery,
            'menu' => 'kategori'
        ]);
    }

    public function gallery_category_edit($id) {
        $category = Galeri::kategori()->where('id_kategori', decrypt($id))->get();

        return view('admin.gallery_category_edit', [
            'title' => 'Edit Kategori',
            'category' => $category,
            'menu' => 'kategori'
        ]);
    }

    public function gallery_category_update(Request $request) {
        $check = Galeri::kategori()->where('id_kategori', '!=', $request->id_kategori)->get();

        foreach ($check as $data) {
            if ($data -> nama_kategori == $request -> nama_kategori) {
                return redirect()->back()->with('error', 'Judul kategori tidak boleh sama.');
            }
        }

        $validated = $request->validate([
            'nama_kategori' => 'required|max:50',
        ]);

        $query = Galeri::kategori()->where('id_kategori', $request->id_kategori)->update($validated);

        if ($query == true) {
            return redirect('/admin-area/kategori-galeri')->with('success', 'Kategori galeri berhasil diedit.');
        } else {
            return redirect('/admin-area/kategori-galeri')->with('error', 'Terjadi kesalahan dalam mengedit kategori.');
        }
    }

    public function gallery_category_submit(Request $request) {
        $request->merge([
            'id_kategori' => Galeri::categoryGenerateID(),
        ]);

        $validated = $request->validate([
            'id_kategori' => 'required|unique:kategori',
            'nama_kategori' => 'required|unique:kategori|max:50'
        ]);

        $query = Galeri::kategori()->insert($validated);
        
        if ($query == true) {
            return redirect('/admin-area/kategori-galeri')->with('success', 'Kategori galeri berhasil ditambahkan.');
        } else {
            return redirect('/admin-area/kategori-galeri')->with('error', 'Terjadi kesalahan dalam menambahkan kategori.');
        }
    }

    public function gallery_category_delete($id) {
        $query = Galeri::where('id_kategori', decrypt($id))->count();

        if ($query == 0) {
            $query = Galeri::kategori()->where('id_kategori', decrypt($id))->delete();

            if ($query == true) {
                return redirect('/admin-area/kategori-galeri')->with('success', 'Kategori galeri berhasil dihapus.');
            } else {
                return redirect('/admin-area/kategori-galeri')->with('error', 'Terjadi kesalahan dalam menghapus kategori.');
            }
        } else {
            return redirect('/admin-area/kategori-galeri')->with('error', 'Kategori masih digunakan oleh data pada galeri, silahkan ganti/hapus kategori pada foto yang masih menggunakan kategori ini.');
        }
    }
}
