<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BeritaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('sejarah', function () {
    return view('sejarah');
});

Route::get('visimisi', function () {
    return view('visimisi');
});

Route::get('so', function () {
    return view('so');
});

Route::get('dirgu', function () {
    return view('dirgu');
});

Route::get('dirtu', function () {
    return view('dirtu');
});

Route::get('ekskul', function () {
    return view('ekskul');
});

Route::get('ppdb', function () {
    return view('ppdb');
});

Route::get('kontak', function () {
    return view('kontak');
});

Route::get('showmore', function () {
    return view('showmore');
});

Route::get('isiberita', function () {
    return view('isiberita');
});

//Admin : Login Page
Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('guest');

//Admin : Verify Login
Route::post('/login', [AkunController::class, 'login'])->middleware('guest');

//Admin : Logout
Route::get('/logout', [AkunController::class, 'logout'])->middleware('auth');

//Admin : Main Page
Route::get('/admin-area', [AdminController::class, 'index'])->middleware('auth');

//Admin : Berita
Route::get('/admin-area/berita-terkini', [AdminController::class, 'berita'])->middleware('auth');

//Admin : Berita -> Search
Route::post('/admin-area/berita-terkini', [BeritaController::class, 'berita_search'])->middleware('auth');

//Admin : Berita -> New Data
Route::get('/admin-area/berita-terkini/new', [AdminController::class, 'berita_new'])->middleware('auth');

//Admin : Berita -> Submit
Route::post('/admin-area/berita-terkini/submit', [BeritaController::class, 'berita_submit'])->middleware('auth');

//Admin : Berita -> Edit Form
Route::get('/admin-area/berita-terkini/edit/{id}', [BeritaController::class, 'berita_edit'])->middleware('auth');

//Admin : Berita -> Edit Data
Route::post('/admin-area/berita-terkini/edit/update', [BeritaController::class, 'berita_update'])->middleware('auth');

//Admin : Berita -> Delete Data
Route::get('/admin-area/berita-terkini/delete/{id}', [BeritaController::class, 'berita_delete'])->middleware('auth');

//Admin : Guru Page
Route::get('/admin-area/dirgu', [AdminController::class, 'guru'])->middleware('auth');

//Admin : Guru Page -> Search
Route::post('/admin-area/dirgu', [GuruController::class, 'guru_search'])->middleware('auth');

//Admin : Guru Page -> New Form
Route::get('/admin-area/dirgu/new', [GuruController::class, 'guru_new'])->middleware('auth');

//Admin : Guru Page -> Submit
Route::post('/admin-area/dirgu/submit', [GuruController::class, 'guru_submit'])->middleware('auth');

//Admin : Guru Page -> Edit Form
Route::get('/admin-area/dirgu/edit/{id}', [GuruController::class, 'guru_edit'])->middleware('auth');

//Admin : Guru Page -> Edit Data
Route::post('/admin-area/dirgu/edit/update', [GuruController::class, 'guru_update'])->middleware('auth');

//Admin : Guru Page -> Delete Data
Route::get('/admin-area/dirgu/delete/{id}', [GuruController::class, 'guru_delete'])->middleware('auth');

// //Admin : Gallery Page
// Route::get('/admin-area/galeri', [AdminController::class, 'gallery'])->middleware('auth');

// //Admin : Gallery Page -> Search
// Route::post('/admin-area/galeri', [GaleriController::class, 'gallery_search'])->middleware('auth');

// //Admin : Gallery Page -> New Data
// Route::get('admin-area/galeri/new', [AdminController::class, 'gallery_new'])->middleware('auth');

// //Admin : Gallery Page -> Submit
// Route::post('admin-area/galeri/submit', [GaleriController::class, 'gallery_submit'])->middleware('auth');

// //Admin : Gallery Page -> Edit Form
// Route::get('/admin-area/galeri/edit/{id}', [GaleriController::class, 'gallery_edit'])->middleware('auth');

// //Admin : Gallery Page -> Edit Data
// Route::post('/admin-area/galeri/edit/update', [GaleriController::class, 'gallery_update'])->middleware('auth');

// //Admin : Gallery Page -> Delete Data
// Route::get('/admin-area/galeri/delete/{id}', [GaleriController::class, 'gallery_delete'])->middleware('auth');

// //Admin : Category Page
// Route::get('/admin-area/kategori-galeri', [AdminController::class, 'gallery_category'])->middleware('auth');

// //Admin : Category Page -> Search
// Route::post('/admin-area/kategori-galeri', [GaleriController::class, 'gallery_category_search'])->middleware('auth');

// //Admin : Category Page -> New Data
// Route::get('/admin-area/kategori-galeri/new', [AdminController::class, 'gallery_category_new'])->middleware('auth');

// //Admin : Category Page -> Submit
// Route::post('/admin-area/kategori-galeri/submit', [GaleriController::class, 'gallery_category_submit'])->middleware('auth');

// //Admin : Category Page -> Details Page
// Route::get('/admin-area/kategori-galeri/detail/{id}', [GaleriController::class, 'gallery_category_details'])->middleware('auth');

// //Admin : Category Page -> Edit Page
// Route::get('/admin-area/kategori-galeri/edit/{id}', [GaleriController::class, 'gallery_category_edit'])->middleware('auth');

// //Admin : Category Page -> Edit Data
// Route::post('/admin-area/kategori-galeri/edit/update', [GaleriController::class, 'gallery_category_update'])->middleware('auth');

// //Admin : Category Page -> Delete Data
// Route::get('/admin-area/kategori-galeri/delete/{id}', [GaleriController::class, 'gallery_category_delete'])->middleware('auth');

// //Admin : Organization
// Route::get('/admin-area/struktur-organisasi', [AdminController::class, 'organization'])->middleware('auth');

// //Admin : Organization -> New Data
// Route::get('/admin-area/struktur-organisasi/new', [AdminController::class, 'organization_new'])->middleware('auth');

// //Admin : Organization -> Submit
// Route::post('/admin-area/struktur-organisasi/submit', [OrganisasiController::class, 'organization_submit'])->middleware('auth');

// //Admin : Oranization -> Edit Page
// Route::get('/admin-area/struktur-organisasi/edit/{id}', [OrganisasiController::class, 'organization_edit'])->middleware('auth');

// //Admin : Oranization -> Edit Data
// Route::post('/admin-area/struktur-organisasi/edit/update', [OrganisasiController::class, 'organization_update'])->middleware('auth');

// //Admin : Oranization -> Delete Data
// Route::get('/admin-area/struktur-organisasi/delete/{id}', [OrganisasiController::class, 'organization_delete'])->middleware('auth');

// //Admin : Curriculum
// Route::get('/admin-area/kurikulum', [AdminController::class, 'curriculum'])->middleware('auth');

// //Admin : Curriculum -> Search
// Route::post('/admin-area/kurikulum', [KurikulumController::class, 'curriculum_search'])->middleware('auth');

// //Admin : Curriculum -> Details
// Route::get('/admin-area/kurikulum/detail/{id}', [KurikulumController::class, 'curriculum_details'])->middleware('auth');

// //Admin : Curriculum -> New Data
// Route::get('/admin-area/kurikulum/new', [AdminController::class, 'curriculum_new'])->middleware('auth');

// //Admin : Curriculum -> Submit
// Route::post('/admin-area/kurikulum/submit', [KurikulumController::class, 'curriculum_submit'])->middleware('auth');

// //Admin : Curriculum -> Edit Page
// Route::get('/admin-area/kurikulum/edit/{id}', [KurikulumController::class, 'curriculum_edit'])->middleware('auth');

// //Admin : Curriculum -> Edit Data
// Route::post('/admin-area/kurikulum/edit/update', [KurikulumController::class, 'curriculum_update'])->middleware('auth');

// //Admin : Curriculum -> Delete Data
// Route::get('/admin-area/kurikulum/delete/{id}', [KurikulumController::class, 'curriculum_delete'])->middleware('auth');



// //Admin : Information
// Route::get('/admin-area/informasi-umum', [AdminController::class, 'about'])->middleware('auth');

// //Admin : Information -> Edit Pictures
// Route::post('/admin-area/informasi-umum/edit-foto', [TentangController::class, 'photo_edit'])->middleware('auth');

// //Admin : Information -> Edit Informasi
// Route::post('/admin-area/informasi-umum/edit-deskripsi', [TentangController::class, 'informasi_edit'])->middleware('auth');

// //Admin : Information -> Edit Visi
// Route::post('/admin-area/informasi-umum/edit-visi', [TentangController::class, 'visi_edit'])->middleware('auth');

// //Admin : Information -> Edit Misi
// Route::post('/admin-area/informasi-umum/edit-misi', [TentangController::class, 'misi_edit'])->middleware('auth');

// //Admin : Information -> Edit Tujuan
// Route::post('/admin-area/informasi-umum/edit-tujuan', [TentangController::class, 'tujuan_edit'])->middleware('auth');

// //Admin : Information -> Edit Sasaran
// Route::post('/admin-area/informasi-umum/edit-sasaran', [TentangController::class, 'sasaran_edit'])->middleware('auth');

// //Admin : Account
// Route::get('/admin-area/akun', [AdminController::class, 'account'])->middleware('auth');

// //Admin : Account -> Search
// Route::post('/admin-area/akun', [AkunController::class, 'account_search'])->middleware('auth');

// //Admin : Account -> Details
// Route::get('/admin-area/akun/detail', [AkunController::class, 'account_detail'])->middleware('auth');

// //Admin : Account -> New Data
// Route::get('/admin-area/akun/new', [AdminController::class, 'account_new'])->middleware('auth');

// //Admin : Account -> Submit
// Route::post('/admin-area/akun/submit', [AkunController::class, 'account_submit'])->middleware('auth');

// //Admin : Account -> Edit Page
// Route::get('/admin-area/akun/edit/{id}/{from}', [AkunController::class, 'account_edit'])->middleware('auth');

// //Admin : Account -> Edit Data
// Route::post('/admin-area/akun/edit/update', [AkunController::class, 'account_update'])->middleware('auth');

// //Admin : Account -> Delete Data
// Route::get('/admin-area/akun/delete/{id}/{from}', [AkunController::class, 'account_delete'])->middleware('auth');

// //Admin : Login Page
// Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('guest');

// //Admin : Verify Login
// Route::post('/login', [AkunController::class, 'login'])->middleware('guest');

// //Admin : Logout
// Route::get('/logout', [AkunController::class, 'logout'])->middleware('auth');

// //Admin : Achievement Page
// Route::get('/admin-area/prestasi-akademik', [AdminController::class, 'achievement'])->middleware('auth');

// //Admin : Achievement Page -> Search
// Route::post('/admin-area/prestasi-akademik', [MahasiswaPrestasiController::class, 'achievement_search'])->middleware('auth');

// //Admin : Achievement Page -> New Data
// Route::get('/admin-area/prestasi-akademik/new', [AdminController::class, 'achievement_new'])->middleware('auth');

// //Admin : Achievement Page -> Submit
// Route::post('/admin-area/prestasi-akademik/submit', [MahasiswaPrestasiController::class, 'achievement_submit'])->middleware('auth');

// //Admin : Achievement Page -> Edit Page
// Route::get('/admin-area/prestasi-akademik/edit/{id}', [MahasiswaPrestasiController::class, 'achievement_edit'])->middleware('auth');

// //Admin : Achievement Page -> Edit Data
// Route::post('/admin-area/prestasi-akademik/update', [MahasiswaPrestasiController::class, 'achievement_update'])->middleware('auth');

// //Admin : Achievement Page -> Delete Data
// Route::get('/admin-area/prestasi-akademik/delete/{id}', [MahasiswaPrestasiController::class, 'achievement_delete'])->middleware('auth');