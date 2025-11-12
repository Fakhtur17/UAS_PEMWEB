<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan semua seeder yang dibutuhkan
        $this->call([
            AdminUserSeeder::class,
            DuskTestDataSeeder::class,
        ]);
    }
}
