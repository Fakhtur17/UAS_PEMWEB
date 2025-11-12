<x-app-layout>
    <div class="container-fluid px-4 py-2">
        <!-- Tombol Logout -->
        <div class="d-flex justify-content-end mb-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" dusk="logout-button" class="btn btn-outline-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
        <main>
            <!-- Judul -->
            <div class="mb-2">
                <h1 class="fw-bold display-5 text-primary">Halo, {{ Auth::user()->name }} 👋</h1>
            </div>

            <!-- Deskripsi Sistem -->
            <section class="mb-5">
                <div class="bg-light rounded p-4 shadow-sm">
                    <h2 class="h4 fw-semibold text-dark">Sistem Manajemen Buku Perpustakaan</h2>
                    <p class="text-muted mb-0">
                        Aplikasi ini memudahkan pengelolaan data buku, rak, kategori, anggota, serta proses peminjaman dan pengembalian buku secara efisien dan terstruktur.
                    </p>
                </div>
            </section>

            <!-- Fitur Utama -->
            <section class="mb-5">
                <h3 class="h5 fw-semibold mb-4 text-secondary">📚 Fitur Utama</h3>
                <div class="row g-4">
                    @php
                        $fitur = [
                            ['title' => 'Manajemen Buku', 'desc' => 'Kelola koleksi buku.', 'route' => 'buku.index', 'icon' => 'fa-book', 'color' => 'primary'],
                            ['title' => 'Rak Buku', 'desc' => 'Atur rak penyimpanan.', 'route' => 'rak.index', 'icon' => 'fa-layer-group', 'color' => 'secondary'],
                            ['title' => 'Kategori Buku', 'desc' => 'Kelola kategori buku.', 'route' => 'kategori.index', 'icon' => 'fa-tags', 'color' => 'dark'],
                            ['title' => 'Data Anggota', 'desc' => 'Kelola informasi anggota.', 'route' => 'anggota.index', 'icon' => 'fa-users', 'color' => 'success'],
                            ['title' => 'Peminjaman', 'desc' => 'Kelola transaksi peminjaman.', 'route' => 'peminjaman.index', 'icon' => 'fa-handshake', 'color' => 'warning'],
                        ];
                    @endphp

                    @foreach ($fitur as $item)
                        <div class="col-md-4">
                            <div class="card feature-card bg-{{ $item['color'] }} text-white h-100 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="card-title"><i class="fa {{ $item['icon'] }} me-2"></i>{{ $item['title'] }}</h5>
                                        <p class="card-text">{{ $item['desc'] }}</p>
                                    </div>
                                    <div>
                                        <a href="{{ route($item['route']) }}" class="text-white text-decoration-underline">Lihat →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>

    <!-- Tambahan Style -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fc;
        }

        .feature-card {
            border: none;
            border-radius: 1rem;
            transition: transform 0.25s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
        }

        .barang-card {
            transition: transform 0.2s ease;
            border-radius: 1rem;
            overflow: hidden;
        }

        .barang-card:hover {
            transform: scale(1.015);
            box-shadow: 0 1rem 1.5rem rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        h1, h2, h3, h4, h5 {
            font-weight: 600;
        }

        .text-decoration-underline:hover {
            text-decoration: none;
        }
    </style>
</x-app-layout>
