<!DOCTYPE html>
<html>
<head>
    <title>Login | CV. KGP</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .login-container {
            width: 350px;
            margin: 100px auto;
            padding: 25px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
        img {
            width: 100px;
            margin-bottom: 20px;
        }
        input[type=email], input[type=password] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('img/logo-kgp.png') }}" alt="Logo CV. KGP">
        <h2>Login CV. KGP</h2>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            @error('email')
                <div style="color: red; font-size: 14px;">{{ $message }}</div>
            @enderror
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
