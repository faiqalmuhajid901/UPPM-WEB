<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request - Set app locale from session.
     * IMPORTANT: This middleware MUST run AFTER StartSession (in 'web' group),
     * otherwise session('locale') will always be null.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $availableLocales = config('app.locales', ['id', 'en']);
        $defaultLocale = config('app.locale', 'id');
        $locale = session('locale');

        if (!is_string($locale) || !in_array($locale, $availableLocales, true)) {
            $locale = in_array($defaultLocale, $availableLocales, true) ? $defaultLocale : 'id';
            session(['locale' => $locale]);
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
