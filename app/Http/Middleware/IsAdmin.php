<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // DEBUG: Lihat nilai role di log
        \Log::info('IsAdmin Check - Email: ' . $user->email . ', Role: ' . $user->role);

        // Cek dengan berbagai kemungkinan nilai role
        $allowedRoles = ['admin', 'superadmin', 'Admin', 'SuperAdmin', '1', '2', 1, 2];
        
        if (in_array($user->role, $allowedRoles, false)) {
            return $next($request);
        }

        // Jika bukan admin
        abort(403, 'Unauthorized. Admin access only.');
    }
}
