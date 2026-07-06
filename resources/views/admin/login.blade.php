<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Giriş — Qan-Donor</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f0f2f5;
        }
        .login-box {
            background: #fff;
            padding: 48px 40px;
            border-radius: 12px;
            border-top: 4px solid #c0392b;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 420px;
        }
        .login-logo {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-logo h1 {
            font-size: 24px;
            color: #c0392b;
            font-weight: 700;
        }
        .login-logo p {
            font-size: 13px;
            color: #999;
            margin-top: 6px;
        }
        label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 6px;
        }
        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            margin-bottom: 20px;
            outline: none;
        }
        input:focus { border-color: #c0392b; }
        .btn-login {
            width: 100%;
            padding: 13px;
            background: #c0392b;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            font-weight: 600;
        }
        .btn-login:hover { background: #a93226; }
        .error {
            background: #fdecea;
            border-left: 3px solid #c0392b;
            color: #c0392b;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="login-logo">
            <h1>Qan-Donor</h1>
            <p>Admin İdarəetmə Paneli</p>
        </div>

        @if($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>

            <label>Şifrə</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn-login">Daxil Ol</button>
        </form>
    </div>
</body>
</html>