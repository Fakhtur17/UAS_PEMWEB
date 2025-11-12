<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Login</title>

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
            background: linear-gradient(to right, #6d4c41, #a1887f, #d7ccc8);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
        }

        .btn-pink {
            width: 100%;
            padding: 10px;
            background-color: #ffccbc;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-pink:hover {
            background-color: #5d4037;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .nav-header {
            position: fixed;
            top: 20px;
            right: 30px;
            z-index: 1050;
            display: flex;
            gap: 0.5rem;
        }

        .nav-header a {
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            background-color: rgba(255, 255, 255, 0.85);
            border: 1px solid #ccc;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            color: #333;
        }

        .nav-header a:hover {
            background-color: #fff3e0;
            border-color: #ffccbc;
            color: #5d4037;
        }
    </style>
</head>
<body>

    <!-- Navigation Header -->
    <div class="nav-header">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" dusk="dashboard-link">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" dusk="logout-button" class="btn btn-link text-danger p-0" style="text-decoration:none;">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" dusk="login-link">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" dusk="register-link">
                        <i class="bi bi-person-plus"></i> Register
                    </a>
                @endif
            @endauth
        @endif
    </div>


    <!-- Login Card -->
    <div class="login-container">
        <div class="login-card">
            <h2>Login</h2>

            @if(session('status'))
                <div class="alert alert-success text-sm">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" dusk="email" name="email" required autofocus class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" dusk="password" name="password" required class="form-control">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button type="submit" dusk="login-button" class="btn btn-pink">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
