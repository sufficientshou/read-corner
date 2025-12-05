<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user terotentikasi dan memiliki peran yang sesuai
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jika tidak memiliki akses, arahkan ke halaman tertentu atau tampilkan pesan error
        return redirect('/login')->withErrors('Anda tidak memiliki akses ke halaman ini.');
    }
}
