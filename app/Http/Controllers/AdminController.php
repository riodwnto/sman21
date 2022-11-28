<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\TU;
use App\Models\Ekskul;
use App\Models\Akun;
use App\Models\User;
use App\Models\Counter;

class AdminController extends Controller
{
    public function index() {
        // $countberita = Berita::count();
        // $countlecturer = Dosen::count();
        // $countcategory = Galeri::kategori()->count();
        // $countgallery = Galeri::vgaleri()->count();
        // $countorganization = Organisasi::count();
        // $countcurriculum = Kurikulum::count();
        $countuser = User::count();
        $countervisits = Counter::getCounterData();

        return view('admin.index', [
            'title' => "Beranda",
            'menu' => "home",
            // 'berita_count' => $countberita,
            // 'information_count' => $countinformation,
            // 'lecturer_count' => $countlecturer,
            // 'category_count' => $countcategory,
            // 'gallery_count' => $countgallery,
            // 'organization_count' => $countorganization,
            // 'curriculum_count' => $countcurriculum,
            'user_count' => $countuser,
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

    public function account() {
        $account = User::paginate(20);

        return view('admin.account', [
            'menu' => "pengguna",
            'title' => 'Data Pengguna',
            'account' => $account
        ]);
    }

    public function account_new() {
        return view('admin.account_new', [
            'menu' => "pengguna",
            'title' => 'Data Pengguna Baru'
        ]);
    }

    public function login() {
        return view('admin.login', [
            'title' => 'Login Page'
        ]);
    }

}