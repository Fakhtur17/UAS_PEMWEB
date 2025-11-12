<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory; // Mengaktifkan fitur factory untuk model ini

    // Daftar atribut yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'judul',         // Judul buku
        'penulis',       // Nama penulis buku
        'tahun_terbit',  // Tahun terbit buku
        'kategori_id',   // Relasi ke tabel kategori
        'rak_id',        // Relasi ke tabel rak
        'stok'           // Jumlah stok buku yang tersedia
    ];

    // Relasi: Buku dimiliki oleh satu kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi: Buku disimpan di satu rak
    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    // Relasi: Satu buku bisa memiliki banyak peminjaman
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
