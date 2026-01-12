<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman Dashboard Admin/User
     */
    public function index()
    {
        // Arahkan ke view dashboard
        // Pastikan file resources/views/dashboard.blade.php ada
        return view('dashboard');
    }
}