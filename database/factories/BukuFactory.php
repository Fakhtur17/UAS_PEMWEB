<?php

namespace Database\Factories;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    protected $model = Buku::class;

    public function definition(): array
{
    return [
        'judul' => $this->faker->sentence(3),
        'penulis' => $this->faker->name(),
        'tahun_terbit' => $this->faker->year(),
        'kategori_id' => \App\Models\Kategori::factory(),
        'rak_id' => \App\Models\Rak::factory(),
    ];
}
}
