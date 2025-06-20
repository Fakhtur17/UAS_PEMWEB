<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rak extends Model
{
    use HasFactory;

    protected $fillable = ['kode_rak', 'lokasi'];

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }
}
