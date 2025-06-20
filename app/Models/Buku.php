<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    // ✅ Tambahkan 'stok' ke fillable
    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'kategori_id',
        'rak_id',
        'stok' // <--- ini yang belum ada sebelumnya!
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
