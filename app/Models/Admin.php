<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];

    // Tentukan kolom yang harus disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
