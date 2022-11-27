<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GuruController;


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
Route::get('/admin-area/dirgu/new', [AdminController::class, 'guru_new'])->middleware('auth');

//Admin : Guru Page -> Submit
Route::post('/admin-area/dirgu/submit', [GuruController::class, 'guru_submit'])->middleware('auth');

//Admin : Guru Page -> Edit Form
Route::get('/admin-area/dirgu/edit/{id}', [GuruController::class, 'guru_edit'])->middleware('auth');

//Admin : Guru Page -> Edit Data
Route::post('/admin-area/dirgu/edit/update', [GuruController::class, 'guru_update'])->middleware('auth');

//Admin : Guru Page -> Delete Data
Route::get('/admin-area/dirgu/delete/{id}', [GuruController::class, 'guru_delete'])->middleware('auth');

//Admin : Admin
Route::get('/admin-area/admin', [AdminController::class, 'admin'])->middleware('auth');

//Admin : Admin -> Search
Route::post('/admin-area/admin', [AkunController::class, 'admin_search'])->middleware('auth');

//Admin : Admin -> Details
Route::get('/admin-area/akun/detail', [AkunController::class, 'admin_detail'])->middleware('auth');

//Admin : Admin -> New Data
Route::get('/admin-area/akun/new', [AdminController::class, 'admin_new'])->middleware('auth');

//Admin : Admin -> Submit
Route::post('/admin-area/akun/submit', [AkunController::class, 'admin_submit'])->middleware('auth');

//Admin : Admin -> Edit Page
Route::get('/admin-area/akun/edit/{id}/{from}', [AkunController::class, 'admin_edit'])->middleware('auth');

//Admin : Admin -> Edit Data
Route::post('/admin-area/akun/edit/update', [AkunController::class, 'admin_update'])->middleware('auth');

//Admin : Admin -> Delete Data
Route::get('/admin-area/akun/delete/{id}/{from}', [AkunController::class, 'admin_delete'])->middleware('auth');