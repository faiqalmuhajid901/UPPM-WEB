<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\Publikasi;
use App\Models\Team;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin
     */
    public function index(): View
    {
        $stats = [
            'penelitian_count' => Penelitian::count(),
            'publikasi_count' => Publikasi::count(),
            'team_count' => Team::count(),
            'recent_penelitian' => Penelitian::latest()->take(5)->get(),
            'recent_publikasi' => Publikasi::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
