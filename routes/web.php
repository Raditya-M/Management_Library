<?php

use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $produk = Produk::all();
    return view('dashboard', compact('produk'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('produk', ProdukController::class)->except('show');
    Route::resource('pesanan', PesananController::class);

    Route::put('/pesanan/{pesanan}/update-status', [PesananController::class, 'updateStatus'])
        ->name('pesanan.updateStatus');
});


Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
    Route::post('/produk/{id}/pinjam', [ProdukController::class, 'pinjam'])->name('produk.pinjam');

    Route::get('/riwayat', [SiswaController::class, 'riwayat'])->name('riwayat');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});








require __DIR__.'/auth.php';
