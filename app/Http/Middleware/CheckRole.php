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
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan pengguna sudah login
        if (!$request->user()) {
            abort(404); // Jika tidak login, tampilkan halaman 404
        }

        $userRole = $request->user()->role;

        // Cek apakah pengguna adalah admin dan mengakses rute admin
        if ($userRole === 'admin' && str_starts_with($request->path(), 'admin')) {
            return $next($request);
        }

        // Cek apakah pengguna adalah user dan mengakses rute user
        if ($userRole === 'user' && str_starts_with($request->path(), 'user')) {
            return $next($request);
        }

        // Jika peran tidak sesuai, tampilkan halaman 404
        abort(404);
    }
}
