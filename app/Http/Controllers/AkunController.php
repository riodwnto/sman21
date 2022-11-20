<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    //Generate Automatic ID : Account
    public static function accountCheckID() {
        $id = Akun::selectRaw('RIGHT (id_akun, 3) AS id_akun')->orderBy('id_akun', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_akun;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "AK-00".$f;
        } else {
            $final = "AK-001";
        }

        return $final;
    }

    public function account_detail() {
        $account = User::where('id', Auth::user()->id)->get();

        return view('admin.account_details', [
            'title' => 'Informasi Pengguna',
            'menu' => 'pengguna',
            'account' => $account
        ]);
    }

    // public function account_submit(Request $request) {
    //     $img = $request->foto;
    //     $imgext = $request->foto->extension();
    //     $imgname = time().'-'.self::accountCheckID().'.'.$imgext;

    //     $img->move(public_path('/img/account'), $imgname);

    //     $query = Akun::insert([
    //         'id_akun'   => self::accountCheckID(),
    //         'nama'      => $request->name,
    //         'username'  => $request->username,
    //         'password'  => Hash::make($request->password),
    //         'profile_pict'  => $imgname,  
    //     ]);
        
    //     if ($query == true) {
    //         return redirect('/admin-area/akun')->with('success', 'Berhasil menambahkan data akun.');
    //     } else {
    //         return redirect('/admin-area/akun')->with('error', 'Terjadi kesalahan dalam menambahkan data akun.');
    //     }
    // }

    public function account_submit(Request $request) {
        $img = $request->foto;
        $imgext = $request->foto->extension();
        $imgname = time().'-'.User::generateID().'.'.$imgext;

        $request->merge([
            'id' => User::generateID(),
            'profile_pict' => $imgname,
        ]);

        $validated = $request->validate([
            'id' => 'required|unique:users',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required_with:retype_password|same:retype_password|min:8|max:255',
            'profile_pict' => 'required'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $query = User::create($validated);

        $img->move(public_path('/img/account'), $imgname);

        if ($query == true) {
            return redirect('/admin-area/akun')->with('success', 'Berhasil menambahkan data akun.');
        } else {
            return redirect('/admin-area/akun')->with('error', 'Terjadi kesalahan dalam menambahkan data akun.');
        }
    }

    public function account_edit($id, $from) {
        $account = User::where('id', decrypt($id))->get();

        //true = delete from profile details
        //false = delete from acc forms
        if ($from == true) {
            return view('admin.account_edit', [
                'title' => 'Edit Data Pengguna',
                'menu' => 'pengguna',
                'account' => $account,
                'admin' => true
            ]);
        } else {
            return view('admin.account_edit', [
                'title' => 'Edit Data Pengguna',
                'menu' => 'pengguna',
                'account' => $account,
                'admin' => false
            ]);
        }
    }

    public function account_update(Request $request) {
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
                'profile_pict' => $imgname,
            ]);

            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => ['required', 'email:dns', Rule::unique('users')->ignore($request->id)],
                'profile_pict' => 'required'
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
            return redirect('/admin-area/akun')->with('success', 'Berhasil mengedit data akun.');
        } else {
            return redirect('/admin-area/akun')->with('error', 'Terjadi kesalahan dalam mengedit data akun.');
        }
    }

    public function account_delete($id, $from) {
        User::deleteImage(decrypt($id));

        $query = User::destroy(decrypt($id));

        if ($query == true) {
            //true = delete from profile details
            //false = delete from acc forms
            if ($from == false) {
                return redirect('/admin-area/akun')->with('success', 'Berhasil menghapus data akun.');
            } else {
                return redirect('/logout')->with('msg', 'deleted');
            }
        } else {
            return redirect('/admin-area/akun')->with('error', 'Terjadi kesalahan dalam menghapus data akun.');
        }
    }

    public function account_search(Request $request) {
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
                return view('admin.account', [
                    'title' => 'Hasil Pencarian Akun : '.$request->cari,
                    'menu' => 'pengguna',
                    'account' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian akun.');
        }
    }

    // public function login(Request $request) {
    //     $acc = User::where('email', $request -> username)->get();
    //     $action = '';

    //     if (count($acc) == 0) {
    //         $action = 'uname_not_found';
    //     } else {
    //         foreach ($acc as $data) {
    //             if (Hash::check($request -> password, $data -> password)) {
    //                 $request->session()->regenerate();
    //                 $request->session()->put('id', encrypt($data -> id_akun));
    //                 $request->session()->put('name', $data -> nama);
    //                 $request->session()->put('profile_pict', $data -> profile_pict);
    //                 $request->session()->put('auth', encrypt(true));

    //                 return redirect('/admin-area');
    //                 break;
    //             } else {
    //                 $action = 'wrong_pass';
    //             }
    //         }
    //     }

    //     if ($action == 'uname_not_found') {
    //         return redirect()->back()->with('error', 'wrong_uname');
    //     } else if ($action == 'wrong_pass') {
    //         return redirect()->back()->with('error', 'wrong_pass');
    //     }
    // }

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

    // public function verify() {
    //     $void = false;

    //     if (is_null(session()->get('id'))) {
    //         $void = null;
    //     } else {
    //         $query = Akun::select('id_akun')->orderBy('id_akun', 'desc')->get();
    //         $end_data = $query[count($query) - 1] -> id_akun;

    //         //dd($end_data);

    //         if ($query != null) {
    //             foreach ($query as $data) {
    //                 if ($data -> id_akun == decrypt(session()->get('id'))) {
    //                     break;
    //                 } else if ($data -> id_akun == $end_data) {
    //                     $void = true;
    //                 }
    //             }
    //         }  else {
    //             $void = true;
    //         }
    //     }

    //     if ($void == true) {
    //         session(['auth' => encrypt(false)]);
    //     } else if (is_null($void)) {
    //         session(['auth' => encrypt('not_login')]);
    //     }

    //     //$temp = decrypt(session()->get('auth'));
    //     //dd($temp);
    // }
}
