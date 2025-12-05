<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(45deg, rgba(100, 149, 237, 0.85), rgba(70, 130, 180, 0.85)), url('https://cdn.pixabay.com/photo/2016/06/23/17/50/library-1472936_1280.jpg');
            background-size: cover;
            background-position: center;
            color: #ffffff;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
            color: #1e3a8a;
        }

        .login-container h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #1e3a8a;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        .login-container h1 img {
            width: 30px;
            height: 30px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-size: 14px;
            font-weight: bold;
            color: #1e3a8a;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        .login-button:hover {
            background-color: #1e40af;
        }

        .error-message {
            color: #d9534f;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .login-link {
            margin-top: 15px;
            font-size: 14px;
            color: #1e3a8a;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>
            <img src="https://img.icons8.com/ios-filled/50/000000/open-book.png" alt="Book Icon">
            Login
        </h1>
        
        @if ($errors->any())
            <div class="error-message">
                <strong>{{ $errors->first() }}</strong>
            </div>
        @endif
    
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
    
        <div class="login-link">
            <p>Belum memiliki akun? <a href="{{ route('register') }}">Daftar Sekarang</a></p>
        </div>
    </div>    
</body>
</html>
