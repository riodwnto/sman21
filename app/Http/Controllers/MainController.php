<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\TU;
use App\Models\Ekskul;
// use App\Models\User;

class MainController extends Controller
{
    public function index() {
        $activity = Berita::orderBy('tgl_kirim', 'DESC')->limit(8)->get();
        $lecturer_counter = Dosen::count();
        $about = Tentang::get();

        return view('main.index', [
            'title' => "Beranda",
            'menu' => 'beranda',
            'activity' => $activity,
            'about' => $about,
            'lecturer_count' => $lecturer_counter,
        ]);
    }

    public function about() {
        $about = Tentang::get();

        return view('main.about', [
            'title' => "Tentang",
            'menu' => 'tentang',
            'about' => $about
        ]);
    }

    public function lecturer() {
        $dosen = Dosen::->where('id', decrypt($id))->get();

        return view('main.lecturer', [
            'dosen' => $dosen,
            'menu' => 'tentang',
            'title' => "Dosen Pengajar"
        ]);
    }

    public function lecturer_details($id) {
        $dosen = Dosen::vdosen()->where('nidn', decrypt($id))->get();

        return view('main.lecturer_details', [
            'dosen' => $dosen,
            'menu' => 'tentang_darken',
            'title' => "Detail Dosen"
        ]);
    }

    public function gallery() {
        $gallery = Galeri::vgaleri()->paginate(12);
        $category = Galeri::kategori()->get();

        return view('main.gallery', [
            'title' => "Galeri",
            'menu' => 'tentang',
            'category' => $category,
            'gallery' => $gallery
        ]);
    }

    public function organization() {
        $organization = Organisasi::get();

        return view('main.organization', [
            'title' => "Struktur Organisasi",
            'menu' => 'tentang',
            'organization' => $organization,
        ]);
    }

    public function curriculum() {
        // $curriculum = Kurikulum::selectRaw('DISTINCT(semester), tipe')->get();
        $curriculum = Kurikulum::orderBy('semester', 'asc')->orderBy('tipe', 'asc')->get();

        $sem1w = Kurikulum::where('semester', '1')->where('tipe', 'w')->get();
        $sem1p = Kurikulum::where('semester', '1')->where('tipe', 'p')->get();

        $sem2w = Kurikulum::where('semester', '2')->where('tipe', 'w')->get();
        $sem2p = Kurikulum::where('semester', '2')->where('tipe', 'p')->get();

        $sem3w = Kurikulum::where('semester', '3')->where('tipe', 'w')->get();
        $sem3p = Kurikulum::where('semester', '3')->where('tipe', 'p')->get();

        $sem4w = Kurikulum::where('semester', '4')->where('tipe', 'w')->get();
        $sem4p = Kurikulum::where('semester', '4')->where('tipe', 'p')->get();

        $sem5w = Kurikulum::where('semester', '5')->where('tipe', 'w')->get();
        $sem5p = Kurikulum::where('semester', '5')->where('tipe', 'p')->get();

        $sem6w = Kurikulum::where('semester', '6')->where('tipe', 'w')->get();
        $sem6p = Kurikulum::where('semester', '6')->where('tipe', 'p')->get();

        $sem7w = Kurikulum::where('semester', '7')->where('tipe', 'w')->get();
        $sem7p = Kurikulum::where('semester', '7')->where('tipe', 'p')->get();

        $sem8w = Kurikulum::where('semester', '8')->where('tipe', 'w')->get();
        $sem8p = Kurikulum::where('semester', '8')->where('tipe', 'p')->get();

        return view('main.curriculum', [
            'title' => "Kurikulum",
            'menu' => 'akademik',
            'curriculum' => $curriculum,
            'sem1w' => $sem1w,
            'sem1p' => $sem1p,
            'sem2w' => $sem2w,
            'sem2p' => $sem2p,
            'sem3w' => $sem3w,
            'sem3p' => $sem3p,
            'sem4w' => $sem4w,
            'sem4p' => $sem4p,
            'sem5w' => $sem5w,
            'sem5p' => $sem5p,
            'sem6w' => $sem6w,
            'sem6p' => $sem6p,
            'sem7w' => $sem7w,
            'sem7p' => $sem7p,
            'sem8w' => $sem8w,
            'sem8p' => $sem8p,
        ]);
    }

    public function curriculum_details($slug) {
        $query = Kurikulum::where('slug', $slug)->get();

        return view('main.curriculum_details', [
            'title' => $query[0] -> nama.' | Kurikulum',
            'menu' => 'tentang_darken',
            'curriculum' => $query,
        ]);
    }

    public function blog() {
        $blog = Berita::paginate(8);

        return view('main.blog', [
            'title' => 'Blog',
            'menu' => 'tentang',
            'blog' => $blog
        ]);
    }

    public function blog_details($slug) {
        $blog = Berita::where('url_slug', $slug)->get();

        return view('main.blog_details', [
            'title' => $blog[0] -> judul.' | Berita',
            'menu' => 'tentang_darken',
            'blog' => $blog
        ]);
    }

    public function services() {
        return view('main.services', [
            'title' => "Layanan Mahasiswa",
            'menu' => 'layanan mhs'
        ]);
    }

    public function academic_achievement() {
        $mhs = MahasiswaPrestasi::get();

        return view('main.academic_achievement', [
            'mhs' => $mhs,
            'menu' => 'akademik',
            'title' => "Prestasi Akademik"
        ]);
    }

    public function academic_achievement_details($slug) {
        $mhs = MahasiswaPrestasi::where('name_slug', $slug)->get();

        return view('main.academic_achievement_details', [
            'mhs' => $mhs,
            'menu' => 'akademik_darken',
            'title' => "Detail Prestasi ".$mhs[0] -> nama
        ]);
    }
}
