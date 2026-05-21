<?php

namespace App\Http\Middleware;

use Closure;

class VerifyCsrfToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah token CSRF ada dan valid
        if ($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('delete')) {
            $token = $request->header('X-CSRF-TOKEN')
                ?? $request->header('X-XSRF-TOKEN')
                ?? $request->input('_token');

            if (!$token || $request->session()->token() !== $token) {
                return response()->json(['error' => 'CSRF token mismatch'], 419);
            }
        }
        return $next($request);
    }
}
