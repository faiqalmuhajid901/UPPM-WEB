<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Layout untuk halaman guest (login, dll)
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
