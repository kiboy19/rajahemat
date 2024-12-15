<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $userRole = $request->user()->role;

        // Cek apakah pengguna adalah admin
        if ($userRole === 'admin' && str_starts_with($request->path(), 'admin')) {
            return $next($request);
        }

        // Cek apakah pengguna adalah user
        if ($userRole === 'user' && str_starts_with($request->path(), 'user')) {
            return $next($request);
        }

        // Jika peran tidak sesuai, abort dengan 403
        abort(403);
    }
}