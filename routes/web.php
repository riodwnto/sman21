<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

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