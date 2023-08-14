<?php use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\TUController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContentCatController;


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

//User : Main Page
Route::get('/', [MainController::class, 'index']);

Route::get('/sejarah', function () {
        return view('sejarah');
    }

);

Route::get('/visimisi', function () {
        return view('visimisi');
    }

);

Route::get('/so', function () {
        return view('so');
    }

);

//User : Main Page
Route::get('/dirgu', [MainController::class, 'dirgu']);

//User : Main Page
Route::get('/dirtu', [MainController::class, 'dirtu']);

//User : Main Page
Route::get('/ekskul', [MainController::class, 'ekskul']);

Route::get('/ppdb', function () {
        return view('ppdb');
    }

);

Route::get('/kontak', function () {
        return view('kontak');
    }

);

//User : Main Page
Route::get('/berita', [MainController::class, 'berita']);

//User : Main Page
Route::get('/berita/{slug}', [MainController::class, 'isiberita']);

//Admin : Login Page
Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('guest');

//Admin : Verify Login
Route::post('/loginaction', [AkunController::class, 'login'])->middleware('guest');

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
Route::get('/admin-area/dirgu/new', [AdminController::class, 'guru_new'])->middleware('auth');

//Admin : Guru Page -> Submit
Route::post('/admin-area/dirgu/submit', [GuruController::class, 'guru_submit'])->middleware('auth');

//Admin : Guru Page -> Edit Form
Route::get('/admin-area/dirgu/edit/{id}', [GuruController::class, 'guru_edit'])->middleware('auth');

//Admin : Guru Page -> Edit Data
Route::post('/admin-area/dirgu/edit/update', [GuruController::class, 'guru_update'])->middleware('auth');

//Admin : Guru Page -> Delete Data
Route::get('/admin-area/dirgu/delete/{id}', [GuruController::class, 'guru_delete'])->middleware('auth');

//Admin : TU Page
Route::get('/admin-area/dirtu', [AdminController::class, 'tu'])->middleware('auth');

//Admin : TU Page -> Search
Route::post('/admin-area/dirtu', [TUController::class, 'tu_search'])->middleware('auth');

//Admin : TU Page -> New Form
Route::get('/admin-area/dirtu/new', [AdminController::class, 'tu_new'])->middleware('auth');

//Admin : TU Page -> Submit
Route::post('/admin-area/dirtu/submit', [TUController::class, 'tu_submit'])->middleware('auth');

//Admin : TU Page -> Edit Form
Route::get('/admin-area/dirtu/edit/{id}', [TUController::class, 'tu_edit'])->middleware('auth');

//Admin : TU Page -> Edit Data
Route::post('/admin-area/dirtu/edit/update', [TUController::class, 'tu_update'])->middleware('auth');

//Admin : TU Page -> Delete Data
Route::get('/admin-area/dirtu/delete/{id}', [TUController::class, 'tu_delete'])->middleware('auth');

//Admin : Ekskul Page
Route::get('/admin-area/ekskul', [AdminController::class, 'ekskul'])->middleware('auth');

//Admin : Ekskul Page -> Search
Route::post('/admin-area/ekskul', [EkskulController::class, 'ekskul_search'])->middleware('auth');

//Admin : Ekskul Page -> New Form
Route::get('/admin-area/ekskul/new', [AdminController::class, 'ekskul_new'])->middleware('auth');

//Admin : Ekskul Page -> Submit
Route::post('/admin-area/ekskul/submit', [EkskulController::class, 'ekskul_submit'])->middleware('auth');

//Admin : Ekskul Page -> Edit Form
Route::get('/admin-area/ekskul/edit/{id}', [EkskulController::class, 'ekskul_edit'])->middleware('auth');

//Admin : Ekskul Page -> Edit Data
Route::post('/admin-area/ekskul/edit/update', [EkskulController::class, 'ekskul_update'])->middleware('auth');

//Admin : Ekskul Page -> Delete Data
Route::get('/admin-area/ekskul/delete/{id}', [EkskulController::class, 'ekskul_delete'])->middleware('auth');

//Admin : Admin
Route::get('/admin-area/adm', [AdminController::class, 'adm'])->middleware('auth');

//Admin : Admin -> Search
Route::post('/admin-area/adm', [AkunController::class, 'adm_search'])->middleware('auth');

//Admin : Admin -> Details
Route::get('/admin-area/adm/detail', [AkunController::class, 'adm_detail'])->middleware('auth');

//Admin : Admin -> New Data
Route::get('/admin-area/adm/new', [AdminController::class, 'adm_new'])->middleware('auth');

//Admin : Admin -> Submit
Route::post('/admin-area/adm/submit', [AkunController::class, 'adm_submit'])->middleware('auth');

//Admin : Admin -> Edit Page
Route::get('/admin-area/adm/edit/{id}/{from}', [AkunController::class, 'adm_edit'])->middleware('auth');

//Admin : Admin -> Edit Data
Route::post('/admin-area/adm/edit/update', [AkunController::class, 'adm_update'])->middleware('auth');

//Admin : Admin -> Delete Data
Route::get('/admin-area/adm/delete/{id}/{from}', [AkunController::class, 'adm_delete'])->middleware('auth');


//Pekerjaan Dicky
//routes jenis buku
Route::get('/admin-area/jenis', [JenisController::class, 'index'])->middleware('auth');
Route::get('/admin-area/jenis/new', [JenisController::class, 'jenis_new'])->middleware('auth');
Route::post('/admin-area/jenis/insert', [JenisController::class, 'jenis_insert'])->middleware('auth');
Route::get('/admin-area/jenis/edit/{id}', [JenisController::class, 'jenis_edit'])->middleware('auth');
Route::post('/admin-area/jenis/update', [JenisController::class, 'jenis_update'])->middleware('auth');
Route::get('/admin-area/jenis/delete/{id}', [JenisController::class, 'jenis_delete'])->middleware('auth');

//routes buku
Route::get('/admin-area/buku', [BukuController::class, 'index'])->middleware('auth');
Route::get('/admin-area/buku/new', [BukuController::class, 'buku_new'])->middleware('auth');
Route::post('/admin-area/buku/insert', [BukuController::class, 'buku_insert'])->middleware('auth');
Route::get('/admin-area/buku/edit/{id}/{from}', [BukuController::class, 'buku_edit'])->middleware('auth');
Route::post('/admin-area/buku/update', [BukuController::class, 'buku_update'])->middleware('auth');
Route::get('/admin-area/buku/delete/{id}', [BukuController::class, 'buku_delete'])->middleware('auth');

//routes rak buku
Route::get('/admin-area/rak', [RakController::class, 'index'])->middleware('auth');
Route::get('/admin-area/rak/new', [RakController::class, 'rak_new'])->middleware('auth');
Route::post('/admin-area/rak/insert', [RakController::class, 'rak_insert'])->middleware('auth');
Route::get('/admin-area/rak/edit/{id}', [RakController::class, 'rak_edit'])->middleware('auth');
Route::post('/admin-area/rak/update', [RakController::class, 'rak_update'])->middleware('auth');
Route::get('/admin-area/rak/delete/{id}', [RakController::class, 'rak_delete'])->middleware('auth');
//routes rak buku
Route::get('/admin-area/siswa', [SiswaController::class, 'index'])->middleware('auth');
Route::get('/admin-area/siswa/new', [SiswaController::class, 'siswa_new'])->middleware('auth');
Route::post('/admin-area/siswa/insert', [SiswaController::class, 'siswa_insert'])->middleware('auth');
Route::get('/admin-area/siswa/edit/{id}', [SiswaController::class, 'siswa_edit'])->middleware('auth');
Route::post('/admin-area/siswa/update', [SiswaController::class, 'siswa_update'])->middleware('auth');
Route::get('/admin-area/siswa/delete/{id}', [SiswaController::class, 'siswa_delete'])->middleware('auth');


Route::get('/admin-area/transaksi', [TransaksiController::class, 'index'])->middleware('auth');
Route::post('/admin-area/qrcode', [TransaksiController::class, 'generateqr'])->middleware('auth');
Route::get('/admin-area/hapuskeranjang/{id}', [TransaksiController::class, 'hapuskeranjang'])->middleware('auth');
Route::post('/admin-area/checkout', [TransaksiController::class, 'checkout'])->middleware('auth');
Route::get('/admin-area/riwayat', [TransaksiController::class, 'riwayat'])->middleware('auth');
Route::get('/admin-area/riwayat/detail/{id}', [TransaksiController::class, 'detailriwayat'])->middleware('auth');
Route::get('/admin-area/riwayat/kembalisemua/{id}', [TransaksiController::class, 'kembalisemua'])->middleware('auth');
Route::get('/admin-area/riwayat/kembalikan/{id}/{any}', [TransaksiController::class, 'kembalikan'])->middleware('auth');
Route::get('/admin-area/riwayat/delete/{id}', [TransaksiController::class, 'delete'])->middleware('auth');
Route::get('/admin-area/riwayat/edit/{id}', [TransaksiController::class, 'edit'])->middleware('auth');
Route::post('/admin-area/riwayat/update', [TransaksiController::class, 'update'])->middleware('auth');
Route::get('/admin-area/riwayat/print/{id}', [TransaksiController::class, 'print'])->middleware('auth');

Route::get('/admin-area/menu-master', [MenuController::class, 'index'])->middleware('auth');
Route::get('/admin-area/menu/new', [MenuController::class, 'menu_new'])->middleware('auth');
Route::post('/admin-area/menu/insert', [MenuController::class, 'menu_insert'])->middleware('auth');
Route::get('/admin-area/menu/edit/{id}', [MenuController::class, 'menu_edit'])->middleware('auth');
Route::post('/admin-area/menu/update', [MenuController::class, 'menu_update'])->middleware('auth');
Route::get('/admin-area/menu/delete/{id}', [MenuController::class, 'menu_delete'])->middleware('auth');

// Rio --> Content
Route::get('/admin-area/content', [ContentController::class, 'index'])->middleware('auth');
Route::get('/admin-area/content/new', [ContentController::class, 'content_new'])->middleware('auth');
Route::post('/admin-area/content/insert', [ContentController::class, 'content_insert'])->middleware('auth');
Route::get('/admin-area/content/edit/{id}', [ContentController::class, 'content_edit'])->middleware('auth');
Route::post('/admin-area/content/update', [ContentController::class, 'content_update'])->middleware('auth');
Route::get('/admin-area/content/delete/{id}', [ContentController::class, 'content_delete'])->middleware('auth');

// Content Category
Route::get('/admin-area/contentcat', [ContentCatController::class, 'index'])->middleware('auth');
Route::get('/admin-area/contentcat/new', [ContentCatController::class, 'contentcat_new'])->middleware('auth');
Route::post('/admin-area/contentcat/insert', [ContentCatController::class, 'contentcat_insert'])->middleware('auth');
Route::get('/admin-area/contentcat/edit/{id}', [ContentCatController::class, 'contentcat_edit'])->middleware('auth');
Route::post('/admin-area/contentcat/update', [ContentCatController::class, 'contentcat_update'])->middleware('auth');
Route::get('/admin-area/contentcat/delete/{id}', [ContentCatController::class, 'contentcat_delete'])->middleware('auth');