<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\TU;
use App\Models\Ekskul;
use App\Models\User;
use App\Models\Counter;

class AdminController extends Controller
{
    public function index() {
        $countberita = Berita::count();
        $countdirgu = Guru::count();
        $countdirtu = TU::count();
        $countekskul = Ekskul::count();
        $countadm = User::count();
        $countervisits = Counter::getCounterData();

        return view('admin.index', [
            'title' => "Beranda",
            'menu' => "home",
            'berita' => $countberita,
            'adm' => $countadm,
            'ekskul' => $countekskul,
            'dirtu' => $countdirtu,
            'dirgu' => $countdirgu,
            'countervisit' => $countervisits,
        ]);
    }
    
    //Guru Page

    public function guru() {
        $guru = Guru::paginate(8);

        return view('admin.guru', [
            'title' => "Data Guru",
            'menu' => "guru",
            'guru' => $guru,
        ]);
    }

    public function guru_new() {
        return view('admin.guru_new', [
            'menu' => "guru",
            'title' => "Tambah Guru Baru",
        ]);
    }

    //TU Page

    public function tu() {
        $tu = TU::paginate(8);

        return view('admin.tu', [
            'title' => "Data Tata Usaha",
            'menu' => "tu",
            'tu' => $tu,
        ]);
    }

    public function tu_new() {
        return view('admin.tu_new', [
            'menu' => "tu",
            'title' => "Tambah Tata Usaha Baru",
        ]);
    }

    //Ekskul Page

    public function ekskul() {
        $ekskul = Ekskul::paginate(8);

        return view('admin.ekskul', [
            'title' => "Data Ekstrakulikuler",
            'menu' => "ekskul",
            'ekskul' => $ekskul,
        ]);
    }

    public function ekskul_new() {
        return view('admin.ekskul_new', [
            'menu' => "ekskul",
            'title' => "Tambah Ekstrakulikuler Baru",
        ]);
    }

    //Berita Controller 

    public function berita() {
        $berita = Berita::paginate(8);

        return view('admin.berita', [
            'menu' => "berita",
            'title' => 'Data Berita Terkini',
            'berita' => $berita,
        ]);
    }

    public function berita_new() {

        return view('admin.berita_new', [
            'menu' => "berita",
            'title' => 'Data Berita Terkini Baru'
        ]);
    }

    // public function about() {
    //     $about = Tentang::get();

    //     return view('admin.about', [
    //         'menu' => "informasi",
    //         'title' => 'Data Informasi Umum',
    //         'about' => $about,
    //     ]);
    // }

    public function adm() {
        $adm = User::paginate(20);

        return view('admin.adm', [
            'menu' => "adm",
            'title' => 'Data Admin',
            'adm' => $adm
        ]);
    }

    public function adm_new() {
        return view('admin.adm_new', [
            'menu' => "adm",
            'title' => 'Data Admin Baru'
        ]);
    }

    public function login() {
        return view('admin.login', [
            'title' => 'Login Page'
        ]);
    }

}