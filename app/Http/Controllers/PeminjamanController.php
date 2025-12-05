<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Pinjam; // Gunakan hanya model Pinjam jika ini yang utama
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Menampilkan daftar buku yang dipinjam oleh user yang login
        $peminjaman = Pinjam::where('user_id', Auth::id())->get();
        return view('peminjaman.list', compact('peminjaman'));
    }

    public function create()
    {
        $books = Book::whereDoesntHave('pinjams', function ($query) {
            $query->where('status', 'dipinjam');
        })->get();

        return view('peminjaman.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        // Simpan data peminjaman buku
        Pinjam::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::id(),
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam',
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Buku berhasil dipinjam.');
    }

    public function update($id)
    {
        // Cari data peminjaman berdasarkan ID
        $peminjaman = Pinjam::findOrFail($id);
        
        // Update status peminjaman dan tanggal pengembalian
        $peminjaman->status = 'dikembalikan';
        $peminjaman->tanggal_pengembalian = now();
        $peminjaman->save();

        // Arahkan kembali ke halaman dashboard pengguna dengan pesan sukses
        return redirect()->route('user.dashboard')->with('success', 'Buku berhasil dikembalikan.');
    }

    public function list()
{
    $peminjaman = Pinjam::with(['book', 'user'])->get();
    return view('peminjaman.list', compact('peminjaman'));
}
public function returnBook($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->status = 'dikembalikan';
    $peminjaman->tanggal_pengembalian = now();
    $peminjaman->save();

    return redirect()->route('peminjaman.list')->with('success', 'Buku berhasil dikembalikan.');
}



    
}
