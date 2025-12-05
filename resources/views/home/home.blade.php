<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Portal</title>
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

        .container {
            position: relative;
            text-align: center;
            background: rgba(255, 255, 255, 0.95);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            max-width: 550px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
            transform: perspective(1000px) rotateY(10deg);
            transition: transform 0.4s ease;
        }

        .container:hover {
            transform: perspective(1000px) rotateY(0deg);
        }

        .container h1 {
            font-size: 40px;
            margin-bottom: 20px;
            color: #1e3a8a;
            font-weight: bold;
            letter-spacing: 2px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .container h1 img {
            width: 50px;
            height: 50px;
        }

        .container p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #4b5563;
            letter-spacing: 1px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .buttons a {
            text-decoration: none;
            font-size: 18px;
            padding: 15px 40px;
            color: white;
            background-color: #2563eb;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
            display: flex;
            align-items: center;
            gap: 10px;
            transform: scale(1);
            position: relative;
        }

        .buttons a:hover {
            background-color: #1e40af;
            transform: scale(1.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .buttons a:nth-child(2) {
            background-color: #10b981;
        }

        .buttons a:nth-child(2):hover {
            background-color: #059669;
        }

        .buttons img {
            width: 26px;
            height: 26px;
        }
        .buttons a img {
            transition: transform 0.3s ease;
        }

        .buttons a:hover img {
            transform: rotate(20deg) scale(1.1);
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .container::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 600px;
            height: 600px;
            background: radial-gradient(rgba(255, 255, 255, 0.15), transparent);
            transform: rotate(45deg);
            animation: spin 6s linear infinite;
            z-index: -1;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>
            <img src="https://img.icons8.com/ios-filled/50/000000/open-book.png" alt="Open Book Icon">
            Welcome to the ReadCorner
        </h1>
        <p>Unlock the World of Knowledge, One Book at a Time</p>

        <div class="buttons">
            <a href="{{ route('login') }}">
                <img src="https://img.icons8.com/ios-filled/50/000000/administrator-male.png" alt="Admin Icon">
                Login Admin
            </a>
            <a href="{{ route('login') }}">
                <img src="https://img.icons8.com/ios-filled/50/000000/administrator-male.png" alt="Admin Icon">
                Login Siswa
            </a>
        </div>
    </div>

</body>
</html>