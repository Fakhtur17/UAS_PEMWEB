<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(to bottom right, #f0f4f8, #fdfcff);
        }

        #sidebar {
            background: linear-gradient(to bottom, #d2b48c, #f5deb3);
            min-height: 100vh;
            padding-top: 1rem;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
        }

        #sidebar .text-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .nav-link {
            color: #333;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background-color: #e9f5ff;
            color: #0d6efd;
        }

        .nav-link.active {
            background-color: #ede7f6;
            color: #7e57c2;
            font-weight: 600;
        }

        main {
            padding: 2rem;
            min-height: 90vh;
            background-color: #fff;
            border-radius: 1rem;
            margin-top: 1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.03);
        }
    </style>

</head>
<body>
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow mb-3">
                <div class="container py-4">
                    {{ $header }}
                </div>
            </header>
        @endisset

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="text-center py-4">
                    <img src="{{ asset('images/perpus.jpeg') }}" class="img-fluid rounded-circle mb-3" style="width: 90px;" alt="Logo">
                    <h5>Sistem Peminjaman</h5>
                </div>
                <ul class="nav flex-column px-3">
                    <li class="nav-item"><a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="fa fa-home me-2"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('buku*') ? 'active' : '' }}" href="{{ route('buku.index') }}"><i class="fa fa-book me-2"></i> Buku</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="{{ route('kategori.index') }}"><i class="fa fa-tags me-2"></i> Kategori</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('rak*') ? 'active' : '' }}" href="{{ route('rak.index') }}"><i class="fa fa-layer-group me-2"></i> Rak</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('anggota*') ? 'active' : '' }}" href="{{ route('anggota.index') }}"><i class="fa fa-users me-2"></i> Anggota</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('peminjaman*') ? 'active' : '' }}" href="{{ route('peminjaman.index') }}"><i class="fa fa-handshake me-2"></i> Peminjaman</a></li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Optional Header Slot -->
                @isset($header)
                    <div class="mb-4 pb-2 border-bottom">
                        {{ $header }}
                    </div>
                @endisset

                <!-- Page Content Slot -->
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>
