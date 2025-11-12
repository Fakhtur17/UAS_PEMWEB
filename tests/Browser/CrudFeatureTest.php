<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rak;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CrudFeatureTest extends DuskTestCase
{
    protected $user;
    protected $anggota;
    protected $buku;

    public function setUp(): void
    {
        parent::setUp();

        // Pastikan database bersih sebelum test dijalankan
        $this->artisan('migrate:fresh', ['--env' => 'dusk.local']);

        // Buat user admin untuk login
        $this->user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

        // Dummy data dasar
        $kategori = Kategori::factory()->create(['nama_kategori' => 'Teknologi']);
        $rak = Rak::factory()->create(['kode_rak' => 'R001', 'lokasi' => 'Lantai 1']);

        $this->anggota = Anggota::factory()->create([
            'nama' => 'Budi',
            'nim' => 'A123',
        ]);

        $this->buku = Buku::factory()->create([
            'judul' => 'Laravel Livewire Testing',
            'kategori_id' => $kategori->id,
            'rak_id' => $rak->id,
        ]);
    }

    /** @test */
    public function test_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@example.com')
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/dashboard')
                ->assertSee('Dashboard');
        });
    }

    /** @test */
    public function test_create_peminjaman()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/peminjaman/create')
                ->waitFor('@anggota_id')
                ->select('@anggota_id', $this->anggota->id)
                ->waitFor('@buku_id')
                ->select('@buku_id', $this->buku->id)
                ->type('@tanggal_pinjam', now()->format('Y-m-d'))
                ->type('@tanggal_kembali', now()->addDays(7)->format('Y-m-d'))
                ->press('@submit')
                ->waitForText('berhasil')
                ->assertSee('berhasil');
        });
    }

    /** @test */
    public function test_read_peminjaman()
    {
        Peminjaman::create([
            'anggota_id' => $this->anggota->id,
            'buku_id' => $this->buku->id,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(7),
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/peminjaman')
                ->assertSee($this->anggota->nama)
                ->assertSee($this->buku->judul);
        });
    }

    /** @test */
    public function test_update_peminjaman()
    {
        $peminjaman = Peminjaman::first();

        if (!$peminjaman) {
            $anggota = Anggota::first() ?? Anggota::factory()->create();
            $buku = Buku::first() ?? Buku::factory()->create([
                'kategori_id' => Kategori::first()->id ?? Kategori::factory()->create()->id,
                'rak_id' => Rak::first()->id ?? Rak::factory()->create()->id,
            ]);

            $peminjaman = Peminjaman::factory()->create([
                'anggota_id' => $anggota->id,
                'buku_id' => $buku->id,
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now()->addDays(7),
            ]);
        }

        $this->browse(function (Browser $browser) use ($peminjaman) {
            $browser->loginAs($this->user)
                ->visit("/peminjaman/{$peminjaman->id}/edit")
                ->waitFor('@tanggal_kembali')
                ->type('@tanggal_kembali', now()->addDays(10)->format('Y-m-d'))
                ->press('@submit')
                ->waitForText('berhasil')
                ->assertSee('berhasil');
        });
    }

    /** @test */
    public function test_delete_peminjaman()
    {
        $peminjaman = Peminjaman::first();

        // Jika belum ada data, buat dulu satu
        if (!$peminjaman) {
            $anggota = Anggota::first() ?? Anggota::factory()->create();
            $buku = Buku::first() ?? Buku::factory()->create([
                'kategori_id' => Kategori::first()->id ?? Kategori::factory()->create()->id,
                'rak_id' => Rak::first()->id ?? Rak::factory()->create()->id,
            ]);

            $peminjaman = Peminjaman::factory()->create([
                'anggota_id' => $anggota->id,
                'buku_id' => $buku->id,
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now()->addDays(7),
            ]);
        }

        $this->browse(function (Browser $browser) use ($peminjaman) {
            $browser->loginAs($this->user)
                ->visit('/peminjaman')
                ->waitFor("@delete-{$peminjaman->id}")
                ->press("@delete-{$peminjaman->id}")
                ->waitForText('berhasil')
                ->assertSee('berhasil');
        });
    }
}
