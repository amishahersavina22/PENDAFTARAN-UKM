<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Optional CSS --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .login-box {
            width: 350px;
            margin: 100px auto;
            padding: 25px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #2d6cdf;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #1e56c5;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .back {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    {{-- Error message --}}
    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>
    <p>
        Belum punya akun?
        <a href="{{ route('loginuser') }}">Daftar di sini</a>
    </p>

</div>

</body>
</html>
