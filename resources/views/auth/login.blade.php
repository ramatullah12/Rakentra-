<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - ROKS</title>

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

        .login-container {
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

        .btn-login {
            background: #2563eb;
            color: #fff;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #1e40af;
        }

        .btn-register {
            border: 1px solid #cbd5f5;
            border-radius: 12px;
            color: #cbd5f5;
        }

        .btn-register:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }

        .divider {
            text-align: center;
            margin: 18px 0;
            font-size: 13px;
            color: #94a3b8;
        }

        .small-link {
            color: #cbd5f5;
        }

        .small-link:hover {
            color: #fff;
        }

        .alert {
            font-size: 13px;
            padding: 8px;
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="logo-box">
        <img src="/images/logo.png">
    </div>

    <div class="title">ROKS System</div>
    <div class="subtitle">Rental & Operational Management</div>

    <!-- ERROR MESSAGE -->
    @if ($errors->any())
        <div class="alert alert-danger text-dark">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3 input-group">
            <i class="bi bi-envelope input-icon"></i>
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        </div>

        <div class="mb-3 input-group">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <i class="bi bi-eye toggle-password" onclick="togglePassword()"></i>
        </div>

        <div class="d-flex justify-content-between mb-3 small">
            <label>
                <input type="checkbox" name="remember"> Remember
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none small-link">
                    Lupa?
                </a>
            @endif
        </div>

        <button class="btn btn-login w-100">Login</button>

        <div class="divider">atau</div>

        <a href="{{ route('register') }}" class="btn btn-register w-100 text-center">
            Buat Akun
        </a>

    </form>

</div>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>

</body>
</html>