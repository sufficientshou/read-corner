<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
            color: #1e3a8a;
        }

        .register-container h1 {
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

        .register-container h1 img {
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

        .register-button {
            width: 100%;
            padding: 12px;
            background-color: #3b82f6;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s, transform 0.2s;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.5);
        }

        .register-button:hover {
            background-color: #1d4ed8;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(29, 78, 216, 0.5);
        }

        .register-button:active {
            background-color: #1e3a8a;
            transform: translateY(0);
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
    </style>
</head>

<body>
    <div class="register-container">
        <h1>
            <img src="https://img.icons8.com/ios-filled/50/000000/open-book.png" alt="Book Icon">
            Register
        </h1>
        
        @if ($errors->any())
            <div class="error-message">
                <strong>{{ $errors->first() }}</strong>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <button type="submit" class="register-button">Register</button>
        </form>
    </div>
</body>
</html>
