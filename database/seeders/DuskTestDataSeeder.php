<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuskTestDataSeeder extends Seeder
{
    public function run(): void
    {
        // Kategori (pakai nama_kategori)
        $kategoriId = DB::table('kategoris')->insertGetId([
            'nama_kategori' => 'Umum',
            'deskripsi'     => 'Kategori umum untuk pengujian Dusk',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // Rak (pakai kode_rak)
        $rakId = DB::table('raks')->insertGetId([
            'kode_rak'   => 'RAK-A',
            'lokasi'     => 'Lantai 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Buku (sesuai fillable model Buku)
        $bukuId = DB::table('bukus')->insertGetId([
            'judul'        => 'Buku Uji Dusk',
            'penulis'      => 'Anonim',
            'tahun_terbit' => 2024,
            'kategori_id'  => $kategoriId,
            'rak_id'       => $rakId,
            'stok'         => 10,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        // Anggota (pakai no_hp)
        $anggotaId = DB::table('anggotas')->insertGetId([
            'nama'       => 'Anggota Uji',
            'nim'        => 'H1D099999',
            'alamat'     => 'Purwokerto',
            'no_hp'      => '08123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        echo "✅ Dusk seed OK: kategori=$kategoriId, rak=$rakId, buku=$bukuId, anggota=$anggotaId\n";
    }
}
