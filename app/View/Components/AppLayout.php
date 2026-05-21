<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Layout untuk halaman admin (authenticated)
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
