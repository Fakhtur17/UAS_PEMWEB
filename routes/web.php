<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Buku\BukuIndex;
use App\Livewire\Buku\BukuCreate;
use App\Livewire\Buku\BukuEdit;

use App\Livewire\Kategori\KategoriIndex;
use App\Livewire\Kategori\KategoriCreate;
use App\Livewire\Kategori\KategoriEdit;

use App\Livewire\Rak\RakIndex;
use App\Livewire\Rak\RakCreate;
use App\Livewire\Rak\RakEdit;

use App\Livewire\Anggota\AnggotaIndex;
use App\Livewire\Anggota\AnggotaCreate;
use App\Livewire\Anggota\AnggotaEdit;

use App\Livewire\Peminjaman\PeminjamanIndex;
use App\Livewire\Peminjaman\PeminjamanCreate;
use App\Livewire\Peminjaman\PeminjamanEdit;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Route profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 📚 CRUD Buku
    Route::get('/buku', BukuIndex::class)->name('buku.index');
    Route::get('/buku/create', BukuCreate::class)->name('buku.create');
    Route::get('/buku/{id}/edit', BukuEdit::class)->name('buku.edit');

    Route::get('/kategori', KategoriIndex::class)->name('kategori.index');
    Route::get('/kategori/create', KategoriCreate::class)->name('kategori.create');
    Route::get('/kategori/{id}/edit', KategoriEdit::class)->name('kategori.edit');

    Route::get('/rak',            RakIndex::class)->name('rak.index');
    Route::get('/rak/create',     RakCreate::class)->name('rak.create');
    Route::get('/rak/{id}/edit',  RakEdit::class)->name('rak.edit');

    Route::get('/anggota',           AnggotaIndex::class)->name('anggota.index');
    Route::get('/anggota/create',    AnggotaCreate::class)->name('anggota.create');
    Route::get('/anggota/{id}/edit', AnggotaEdit::class)->name('anggota.edit');

    Route::get('/peminjaman',           PeminjamanIndex::class)->name('peminjaman.index');
    Route::get('/peminjaman/create',    PeminjamanCreate::class)->name('peminjaman.create');
    Route::get('/peminjaman/{id}/edit', PeminjamanEdit::class)->name('peminjaman.edit');

});

require __DIR__.'/auth.php';
