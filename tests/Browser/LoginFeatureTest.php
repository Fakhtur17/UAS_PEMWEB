<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;

class LoginFeatureTest extends DuskTestCase
{
    private function admin(): User
    {
        $user = User::where('email', 'admin@example.com')->first();
        $this->assertNotNull($user, 'Admin user tidak ditemukan. Pastikan AdminUserSeeder membuat admin@example.com / "password".');
        return $user;
    }

    #[Test]
    public function halaman_login_tampil_dengan_benar(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/__dusk/logout') // pastikan guest
                ->visit('/login')
                ->waitFor('@email', 10)
                ->assertPresent('@email')
                ->assertPresent('@password')
                ->assertPresent('@login-button')
                ->assertSeeIn('body', 'Login')
                ->assertSeeIn('body', 'Remember me');
        });
    }

    #[Test]
    public function user_dapat_login_dengan_credential_benar(): void
    {
        $user = $this->admin();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/__dusk/logout')
                ->visit('/login')
                ->waitFor('@email', 10)
                ->type('@email', $user->email)
                ->type('@password', 'password')
                ->click('@login-button')
                ->waitForLocation('/dashboard', 10)
                ->assertPathBeginsWith('/dashboard')
                ->assertSee('Dashboard');
        });
    }

    #[Test]
    public function user_tidak_dapat_login_dengan_password_salah(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/__dusk/logout')
                ->visit('/login')
                ->waitFor('@email', 10)
                ->type('@email', 'admin@example.com')
                ->type('@password', 'salahpassword')
                ->click('@login-button')
                ->pause(500)
                ->assertPathIs('/login'); // tetap di login
            // jika mau assert pesan, sesuaikan bahasa app:
            // ->assertSeeIn('body', 'These credentials do not match our records.')
        });
    }

    #[Test]
    public function tombol_register_mengarahkan_ke_halaman_register(): void
    {
        if (!\Illuminate\Support\Facades\Route::has('register')) {
            $this->markTestSkipped('Route register tidak tersedia.');
        }

        $this->browse(function (Browser $browser) {
            $browser->visit('/__dusk/logout')
                ->visit('/login')
                ->waitFor('@register-link', 10)
                ->click('@register-link')
                ->waitForLocation('/register', 10)
                ->assertPathIs('/register')
                ->assertSee('Register');
        });
    }

    #[Test]
    public function tombol_dashboard_muncul_saat_user_login(): void
    {
        $user = $this->admin();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/')
                ->waitFor('@dashboard-link', 10)
                ->click('@dashboard-link')
                ->waitForLocation('/dashboard', 10)
                ->assertPathBeginsWith('/dashboard')
                ->assertSee('Dashboard');
        });
    }

    #[Test]
    public function user_bisa_logout_dan_kembali_ke_login(): void
    {
        $user = $this->admin();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->assertSee('Dashboard')
                ->waitFor('@logout-button', 10)
                ->click('@logout-button')
                // verifikasi benar-benar logout:
                ->visit('/dashboard')
                ->waitForLocation('/login', 10)
                ->assertPathIs('/login')
                ->assertSee('Login');
        });
    }
}
