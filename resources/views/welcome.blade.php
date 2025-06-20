<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistem Perpustakaan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            margin: 0;
            min-height: 100vh;
        }

        .login-wrapper {
            display: flex;
            flex-wrap: wrap;
            min-height: 100vh;
        }

        .left-section {
            background-image: url('{{ asset('images/bg4.jpg') }}');
            background-size: cover;
            background-position: center;
            flex: 1;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            min-width: 300px;
        }

        .left-content {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 2rem;
            border-radius: 10px;
            max-width: 600px;
        }

        .left-content h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .left-content p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .right-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fdfdfd;
            padding: 2rem;
            min-width: 300px;
        }

        .nav-header {
            position: fixed;
            top: 20px;
            right: 30px;
            z-index: 1050;
        }

        .nav-header a {
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            background-color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            transition: 0.3s;
        }

        .nav-header a:hover {
            background-color: #fff3e0;
            border-color: #ffccbc;
            color: #5d4037;
        }

        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="nav-header">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
            @else
                <a href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><i class="bi bi-person-plus"></i> Register</a>
                @endif
            @endauth
        @endif
    </div>

    <!-- Main Content -->
    <div class="login-wrapper">
        <!-- Left Section -->
        <div class="left-section">
            <div class="left-content">
                <h1>Sistem Manajemen Perpustakaan</h1>
                <p>
                    Sistem Manajemen Perpustakaan adalah platform digital yang dirancang untuk mempermudah proses pengelolaan buku, data anggota, peminjaman, dan pengembalian. 
                    Sistem ini memungkinkan pustakawan dan anggota untuk berinteraksi secara efisien, serta menyediakan pelaporan dan pemantauan aktivitas secara real-time.
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
