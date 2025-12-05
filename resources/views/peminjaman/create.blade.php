<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #90caf9; 
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 100%;
            animation: fadeInUp 1s ease-out;
        }
        .form-header {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1976d2;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            position: relative;
        }
        .form-header i {
            margin-right: 8px;
            font-size: 28px;
            color: #42a5f5;
            animation: rotate 1.5s linear infinite;
        }
        .form-group label {
            font-weight: 600;
            color: #1e88e5;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #90caf9;
            padding: 10px;
            font-size: 14px;
            color: #424242;
            background-color: #f3f9ff;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #1e88e5;
            box-shadow: 0 0 5px rgba(30, 136, 229, 0.4);
        }
        .btn-primary {
            background-color: #43a047;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }
        .btn-primary i {
            margin-right: 8px;
        }
        .btn-primary:hover {
            background-color: #2e7d32;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <i class="fas fa-book-reader"></i> Form Peminjaman Buku
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="book_id"><i class="fas fa-book"></i> Pilih Buku</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    <option value="">Pilih Buku</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam"><i class="fas fa-calendar-alt"></i> Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-bookmark"></i> Pinjam Buku
            </button>
        </form>
    </div>
</body>
</html>
