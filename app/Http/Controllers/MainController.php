<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\TU;
use App\Models\Ekskul;
// use App\Models\Siswa;

class MainController extends Controller
{
    public function index() {
        $berita = Berita::orderBy('created_at', 'DESC')->limit(8)->get();
        $guru_counter = Guru::count();
        $tu_counter = TU::count();
        $ekskul_counter = Ekskul::count();
        
        return view('index', [
            'title' => "Beranda",
            'menu' => 'beranda',
            'berita' => $berita,
            'guru_count' => $guru_counter,
            'tu_count' => $tu_counter,
            'ekskul_count' => $ekskul_counter,
        ]);
    }

    public function guru() {
        $guru = Guru::get();

        return view('guru', [
            'guru' => $guru,
            'menu' => 'dirgu',
            'title' => "Direktori Guru"
        ]);
    }

    public function tu() {
        $tu = TU::get();

        return view('tu', [
            'tu' => $tu,
            'menu' => 'dirtu',
            'title' => "Direktori Tata Usaha"
        ]);
    }

    public function ekskul() {
        $ekskul = Ekskul::get();

        return view('ekskul', [
            'ekskul' => $ekskul,
            'menu' => 'ekskul',
            'title' => "Ekstrakulikuler"
        ]);
    }

    public function berita() {
        $berita = Berita::paginate(8);

        return view('berita', [
            'title' => 'Berita',
            'menu' => 'berita',
            'berita' => $berita
        ]);
    }

    public function isiberita($slug) {
        $berita = Berita::where('url_slug', $slug)->get();

        return view('isiberita', [
            'title' => $berita[0] -> judul.' | Berita',
            'menu' => 'berita',
            'berita' => $berita
        ]);
    }
}
