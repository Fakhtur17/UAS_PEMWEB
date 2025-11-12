<?php

namespace Database\Factories;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeminjamanFactory extends Factory
{
    protected $model = Peminjaman::class;

    public function definition(): array
    {
        return [
            'anggota_id' => Anggota::factory(),
            'buku_id' => Buku::factory(),
            'tanggal_pinjam' => $this->faker->date(),
            'tanggal_kembali' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
        ];
    }
}
