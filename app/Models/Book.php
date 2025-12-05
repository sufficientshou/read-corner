<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',

    ]; // Sesuaikan dengan field di tabel buku

    public function pinjams()
    {
        return $this->hasMany(Pinjam::class, 'book_id'); // Asumsi 'book_id' adalah foreign key di tabel pinjam
    }
}




