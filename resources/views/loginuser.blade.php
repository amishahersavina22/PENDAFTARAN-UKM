<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="auth-card">
    <h2>Daftar Akun</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="error">{{ $error }}</div>
        @endforeach
    @endif

    <form method="POST" action="{{ route('loginuser.store') }}">
        @csrf

        <div class="auth-group">
            <label>Nama</label>
            <input type="text" name="name" required>
        </div>

        <div class="auth-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="auth-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="auth-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button class="auth-btn">Daftar</button>
    </form>

    <div class="auth-footer">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
    </div>
</div>

</body>
</html>
