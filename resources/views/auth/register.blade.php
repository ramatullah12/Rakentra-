<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - ROKS</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-container {
            width: 100%;
            max-width: 420px;
            backdrop-filter: blur(15px);
            background: rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            color: #fff;
        }

        .logo-box {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo-box img {
            height: 55px;
        }

        .title {
            text-align: center;
            font-weight: 600;
            margin-top: 8px;
        }

        .subtitle {
            text-align: center;
            font-size: 13px;
            color: #cbd5f5;
            margin-bottom: 20px;
        }

        .form-control {
            background: rgba(255,255,255,0.1);
            border: none;
            color: #fff;
            border-radius: 12px;
            padding-left: 40px;
        }

        .form-control::placeholder {
            color: #cbd5f5;
        }

        .form-control:focus {
            box-shadow: 0 0 0 2px rgba(37,99,235,0.5);
            background: rgba(255,255,255,0.15);
            color: #fff;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #cbd5f5;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #cbd5f5;
        }

        .btn-submit {
            background: #2563eb;
            color: #fff;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-submit:hover {
            background: #1e40af;
        }

        .link-login {
            text-align: center;
            display: block;
            margin-top: 15px;
            color: #cbd5f5;
            font-size: 13px;
        }

        .link-login:hover {
            color: #fff;
        }

        .alert {
            font-size: 13px;
            padding: 8px;
        }
    </style>
</head>

<body>

<div class="register-container">

    <!-- LOGO -->
    <div class="logo-box">
        <img src="{{ asset('images/logo.png') }}" alt="ROKS Logo">
    </div>

    <div class="title">ROKS System</div>
    <div class="subtitle">Buat akun baru</div>

    <!-- ERROR -->
    @if ($errors->any())
        <div class="alert alert-danger text-dark">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3 input-group">
            <i class="bi bi-person input-icon"></i>
            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3 input-group">
            <i class="bi bi-envelope input-icon"></i>
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3 input-group">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <i class="bi bi-eye toggle-password" onclick="togglePassword('password')"></i>
        </div>

        <div class="mb-3 input-group">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" name="password_confirmation" id="confirm" class="form-control" placeholder="Konfirmasi Password" required>
            <i class="bi bi-eye toggle-password" onclick="togglePassword('confirm')"></i>
        </div>

        <button class="btn btn-submit w-100">Daftar</button>

        <a href="{{ route('login') }}" class="link-login">
            Sudah punya akun? Login
        </a>

    </form>

</div>

<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>

</body>
</html>