<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b3e5fc; 
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            color: #1e88e5;
            margin-bottom: 20px;
            text-align: center;
            font-family: 'Comic Sans MS', cursive;
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
        }
        .card-header {
            font-weight: bold;
            background-color: #64b5f6;
            color: #fff;
            font-size: 1.2em;
        }
        .btn-primary {
            background-color: #43a047; 
            border: none;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background-color: #388e3c; 
        }
        .btn-success {
            background-color: #43a047;
            border: none;
            border-radius: 20px;
        }
        .btn-success:hover {
            background-color: #388e3c;
        }
        .btn-warning {
            background-color: #ffa726;
            border: none;
            border-radius: 20px;
        }
        .btn-warning:hover {
            background-color: #fb8c00;
        }
        .btn-danger {
            background-color: #e53935;
            border: none;
            border-radius: 20px; /* Sama seperti tombol lainnya */
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c62828;
            color: #fff;
        }
        .book-item {
            background-color: #bbdefb;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .book-item:hover {
            transform: scale(1.05);
        }
        .card-title {
            color: #1976d2;
            font-weight: bold;
            font-size: 1.2em;
        }
        .peminjaman-item h5 {
            margin: 0;
            font-weight: bold;
            color: #0d47a1;
        }
        .peminjaman-item p {
            margin: 5px 0;
            color: #1565c0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Dashboard User</h1>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Daftar Buku Tersedia -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Buku Tersedia</span>
            <div>
                <a href="{{ url('/') }}" class="btn btn-primary mr-2">Home</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary ml-2">Pinjam Buku</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($books as $book)
                    <div class="col-md-4 mb-4">
                        <div class="book-item card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">Penulis: {{ $book->author }}</p>
                                <form action="{{ route('peminjaman.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <button type="submit" class="btn btn-success">Pinjam Buku</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center w-100">Tidak ada buku tersedia saat ini.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Riwayat Peminjaman Saya -->
    <div class="card mb-4">
        <div class="card-header">Riwayat Peminjaman Saya</div>
        <div class="card-body">
            @forelse ($peminjamans as $item)
                <div class="peminjaman-item">
                    <h5>{{ $item->book->title }}</h5>
                    <p>Status: {{ $item->status }}</p>
                    @if($item->status === 'dipinjam')
                        <form action="{{ route('peminjaman.update', $item->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">Kembalikan Buku</button>
                        </form>
                    @else
                        <p>Tanggal Pengembalian: {{ $item->tanggal_pengembalian }}</p>
                    @endif
                </div>
                <hr>
            @empty
                <p class="text-center">Tidak ada riwayat peminjaman saat ini.</p>
            @endforelse
        </div>
    </div>
</div>
</body>
</html>
