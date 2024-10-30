<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\Testresource;
use Illuminate\Support\Facades\Route;

date_default_timezone_set('Asia/Jakarta');

Route::get('/', function () {
    return view('welcome');
});

// pertemuan 2 membuat routes
Route::get('/jam', function () {
    $datestamp = date('Y-m-d H:i:s');
    echo "Tanggal dan waktu saat ini " . $datestamp;

});

Route::get('/test/{param1},{param2}', function (String $param1, String $param2) {
    if ($param1 == 0 && $param2 == 0) {
        echo "Silahkan masuk parameter";
    } elseif ($param1 == 0) {
        echo $param2;
    } elseif ($param2 == 0) {
        echo $param1;
    } else {
        echo $param1 * $param2;
    }
});

// pertemuan 3
Route::get('/test/{parameter}', [testcontroller::class, 'test']); //jangan lupa import class testcontroller
Route::get('/versi/{parameter2}', [testcontroller::class, 'versi']);
Route::get('/hash/{parameter3}', [testcontroller::class, 'hash']);
Route::get('/rand/{parameter4}/{parameter5}', [testcontroller::class, 'rand']);

Route::get('/index', [Testresource::class, 'index']);

Route::get('/store/{parameter1}/{parameter2}', [Testresource::class, 'store']);

Route::get('/show/{param1}', [Testresource::class, 'show']);

Route::get('/edit/{param1}', [Testresource::class, 'edit']);

Route::get('/destroy/{param1}', [Testresource::class, 'destroy']);

//lanjutan pert 3
Route::get('home', [HomeController::class, 'index']);

Route::get('index2', [HomeController::class, 'index2']);

// pertemuan 4

Route::post('/home/signup', [HomeController::class, 'signup']);

Route::get('/auth', [AuthController::class, 'index']);

Route::post('/auth/login', [AuthController::class, 'login'])->name('login');

//pertemuan 5
Route::get('/home/{param1}', [HomeController::class, 'redirectTo']);

// routes/web.php

Route::get('/homepage', function () {
    return view('homepage'); // Buat view untuk homepage
})->name('homepage');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//PERTEMUAN 6

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::POST('pelanggan/create/store', [PelangganController::class, 'store'])->name('pelanggan.store');

Route::get('pelanggan/edit/{param1}', [PelangganController::class, 'edit'])->name('pelanggan.edit');

Route::post('pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::get('pelanggan/destroy/{param1}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

Route::get('mitra', [MitraController::class, 'index'])->name('mitra.index');
Route::get('mitra/create', [MitraController::class, 'create'])->name('mitra.create');
Route::post('mitra/store', [MitraController::class, 'store'])->name('mitra.store');

// Use the correct parameter name in the edit route
Route::get('mitra/edit/{param1}', [MitraController::class, 'edit'])->name('mitra.edit');

// For the update method, you might want to use a PUT or PATCH request instead of POST
Route::post('mitra/update', [MitraController::class, 'update'])->name('mitra.update');

// Use the correct parameter name in the destroy route
Route::get('mitra/destroy/{param1}', [MitraController::class, 'destroy'])->name('mitra.destroy');

