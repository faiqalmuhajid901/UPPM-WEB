<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Gunakan $request->user() untuk mengambil user login
        // Pastikan middleware ini dijalankan setelah middleware 'auth' di web.php
        $currentUser = $request->user();

        // Cek apakah role user termasuk admin atau super_admin
        if (in_array($currentUser->role, ['admin', 'super_admin'])) {
            // Jika YA, silakan lanjut (masuk halaman admin)
            return $next($request);
        }

        // Jika TIDAK (User biasa), lempar balik ke dashboard user
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses admin.');
    }
}