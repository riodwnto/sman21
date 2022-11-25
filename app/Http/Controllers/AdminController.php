<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Dosen;
use App\Models\Tentang;
use App\Models\Galeri;
use App\Models\Kurikulum;
use App\Models\Organisasi;
use App\Models\Akun;
use App\Models\User;
use App\Models\Counter;
use App\Models\MahasiswaPrestasi;

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
    
    //Lecturer Page

    public function lecturer() {
        $dosen = Dosen::vdosen()->paginate(8);

        return view('admin.lecturer', [
            'title' => "Data Dosen",
            'menu' => "dosen",
            'dosen' => $dosen,
        ]);
    }

    public function lecturer_new() {
        return view('admin.lecturer_new', [
            'menu' => "dosen",
            'title' => "Tambah Dosen Baru",
        ]);
    }

    //Gallery Controller 

    public function gallery() {
        $gallery = Galeri::vgaleri()->paginate(8);

        return view('admin.gallery', [
            'title' => "Galeri",
            'menu' => "galeri",
            'gallery' => $gallery,
        ]);
    }

    public function gallery_new() {
        $category = Galeri::kategori()->get();

        return view('admin.gallery_new', [
            'category' => $category,
            'menu' => "galeri",
            'title' => "Upload Foto Baru",
        ]);
    }

    //Category Controller 

    public function gallery_category() {
        $category = Galeri::kategori()->paginate(20);

        return view('admin.gallery_category', [
            'category' => $category,
            'menu' => "kategori",
            'title' => "Kategori Foto"
        ]);
    }

    public function gallery_category_new() {

        return view('admin.gallery_category_new', [
            'menu' => "kategori",
            'title' => "Kategori Foto Baru"
        ]);
    }

    //Organization Controller

    public function organization() {
        $organization = Organisasi::get();

        return view('admin.organization', [
            'title' => "Struktur Organisasi",
            'menu' => "organisasi",
            'organization' => $organization,
        ]);
    }

    public function organization_new() {
        return view('admin.organization_new', [
            'menu' => "organisasi",
            'title' => "Data Organisasi Baru"
        ]);
    }

    //Curriculum Controller

    public function curriculum() {
        $curriculum = Kurikulum::paginate(20);

        return view('admin.curriculum', [
            'menu' => "kurikulum",
            'title' => "Data Kurikulum",
            'curriculum' => $curriculum,
        ]);
    }

    public function curriculum_new() {
        return view('admin.curriculum_new', [
            'menu' => "kurikulum",
            'title' => "Data Kurikulum Baru"
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

    public function about() {
        $about = Tentang::get();

        return view('admin.about', [
            'menu' => "informasi",
            'title' => 'Data Informasi Umum',
            'about' => $about,
        ]);
    }

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

    public function achievement() {
        $mhs = MahasiswaPrestasi::paginate(8);

        return view('admin.achievement', [
            'title' => 'Data Prestasi Akademik',
            'menu' => 'prestasi_akademik',
            'mhs' => $mhs
        ]);
    }

    public function achievement_new() {
        return view('admin.achievement_new', [
            'title' => 'Data Prestasi Akademik Baru',
            'menu' => 'prestasi_akademik',
        ]);
    }
}
