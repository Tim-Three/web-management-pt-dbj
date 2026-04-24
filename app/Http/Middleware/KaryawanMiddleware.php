<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KaryawanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->role !== 'karyawan') {
            // Admin mencoba akses page user? Balikin ke admin dashboard
            return redirect()->route('admin.beranda')
                ->with('error', 'Halaman sebelumnya itu khusus untuk Karyawan.');
        }

        return $next($request);
    }
}
