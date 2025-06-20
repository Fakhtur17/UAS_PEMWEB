<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nim', 'alamat', 'no_hp'];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}

