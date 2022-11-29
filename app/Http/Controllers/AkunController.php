<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{

    public function adm_detail() {
        $adm = User::where('id', Auth::user()->id)->get();

        return view('admin.adm_details', [
            'title' => 'Informasi Admin',
            'menu' => 'adm',
            'adm' => $adm
        ]);
    }

    public function adm_submit(Request $request) {
        $img = $request->foto;
        $imgext = $request->foto->extension();
        $imgname = time().'-'.User::generateID().'.'.$imgext;


        $request->merge([
            'id' => User::generateID(),
            'profil_pict' => $imgname,
        ]);

        $validated = $request->validate([
            'id' => 'required|unique:users',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required_with:retype_password|same:retype_password|min:8|max:255',
            'profil_pict' => 'required'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $query = User::create($validated);

        $img->move(public_path('/img/account'), $imgname);

        if ($query == true) {
            return redirect('/admin-area/adm')->with('success', 'Berhasil menambahkan data admin.');
        } else {
            return redirect('/admin-area/adm')->with('error', 'Terjadi kesalahan dalam menambahkan data admin.');
        }
    }

    public function adm_edit($id, $from) {
        $adm = User::where('id', decrypt($id))->get();

        //true = delete from profile details
        //false = delete from acc forms
        if ($from == true) {
            return view('admin.adm_edit', [
                'title' => 'Edit Data Admin',
                'menu' => 'adm',
                'adm' => $adm,
                'admin' => true
            ]);
        } else {
            return view('admin.adm_edit', [
                'title' => 'Edit Data Admin',
                'menu' => 'adm',
                'adm' => $adm,
                'admin' => false
            ]);
        }
    }

    public function adm_update(Request $request) {
        $img = $request->foto;
        $pass_check = $request->password;
        $query_check = User::where('id', $request->id)->get();

        if ($pass_check != null) {
            if (Hash::check($request->old_password, $query_check[0]->password)) {
                $validated = $request->validate([
                    'password' => 'required_with:retype_password|same:retype_password|min:8|max:255'
                ]);
    
                $validated['password'] = Hash::make($validated['password']);
            } else {
                return redirect()->back()->with('error_pass', 'Sandi tidak sama dengan database');
            }
        } else if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request -> id.'.'.$imgext;
            $request->merge([
                'profil_pict' => $imgname,
            ]);

            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => ['required', 'email:dns', Rule::unique('users')->ignore($request->id)],
                'profil_pict' => 'required'
            ]);

            User::deleteImage($request->id);
            $img->move(public_path('/img/account'), $imgname);
        } else {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => ['required', 'email:dns', Rule::unique('users')->ignore($request->id)],
            ]);
        }
        
        $query = User::where('id', $request->id)->update($validated);

        if ($query == true) {
            return redirect('/admin-area/adm')->with('success', 'Berhasil mengedit data admin.');
        } else {
            return redirect('/admin-area/adm')->with('error', 'Terjadi kesalahan dalam mengedit data admin.');
        }
    }

    public function adm_delete($id, $from) {
        User::deleteImage(decrypt($id));

        $query = User::destroy(decrypt($id));

        if ($query == true) {
            //true = delete from profile details
            //false = delete from acc forms
            if ($from == false) {
                return redirect('/admin-area/adm')->with('success', 'Berhasil menghapus data admin.');
            } else {
                return redirect('/logout')->with('msg', 'deleted');
            }
        } else {
            return redirect('/admin-area/adm')->with('error', 'Terjadi kesalahan dalam menghapus data admin.');
        }
    }

    public function adm_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = User::where('name', 'like',$validated)->orWhere('email', 'like',$validated)->orWhere('id', 'like',$validated)->paginate(8);

        //dd($query);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Akun tidak ditemukan.');
            } else {
                return view('admin.adm', [
                    'title' => 'Hasil Pencarian Akun : '.$request->cari,
                    'menu' => 'adm',
                    'adm' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian akun.');
        }
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin-area');
        }

        return back()->with('message', 'E-Mail / Sandi yang anda masukkan salah.');
    }

    public function logout() {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        if (session()->has('msg')) {
            return redirect('/login')->with('message', 'Penghapusan akun berhasil.');
        } else {
            return redirect('/login');
        }
    }

}
