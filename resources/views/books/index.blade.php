<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(45deg, rgba(100, 149, 237, 0.85), rgba(70, 130, 180, 0.85)), 
                              url('https://cdn.pixabay.com/photo/2016/06/23/17/50/library-1472936_1280.jpg');
            background-size: cover; 
            background-position: center; 
        }   
        .container {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.9); 
            border-radius: 8px; 
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #1e3a8a; 
            margin-bottom: 20px;
            text-align: center;
            font-size: 36px;
            font-weight: bold; 
        }
        h1 img {
            width: 50px; 
            height: 50px; 
            vertical-align: middle; 
            margin-right: 10px; 
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .custom-table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .custom-table th, .custom-table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        .custom-table th {
            background-color: #3498db;
            color: #fff;
        }
        .custom-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-warning {
            color: #fff;
        }
        .btn-danger {
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>
            <img src="https://img.icons8.com/ios-filled/50/000000/open-book.png" alt="Book Icon">
            Book List
        </h1>
        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
                <a href="{{ route('peminjaman.list') }}" class="btn btn-primary ml-2">Data Peminjam</a>
            </div>
            <div>
                <a href="{{ url('/') }}" class="btn btn-primary mr-2">Home</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->year }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</body>
</html>
