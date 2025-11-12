<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnggotaCreateTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_bisa_membuka_form_tambah_anggota_dan_menyimpan_data()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create([
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);

            $browser->loginAs($user)
                ->visit('/anggota/create')
                ->assertSee('Tambah Anggota')

                // beri waktu livewire render
                ->pause(1500)

                ->type('@nama', 'Budi Santoso')
                ->type('@nim', '1234567890')
                ->type('@alamat', 'Jl. Merdeka No. 10')
                ->type('@no_hp', '081234567890')
                ->press('@simpan-button')

                ->pause(2000) // tunggu redirect livewire

                ->assertPathIs('/anggota')
                ->assertSee('Budi Santoso');
        });
    }
}
