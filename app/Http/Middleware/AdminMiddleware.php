<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
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

        if (auth()->user()->role !== 'admin') {
            // Balikin ke dashboard user dengan pesan flash
            return redirect()->route('karyawan.beranda')
                ->with('error', 'Halaman sebelumnya itu khusus Admin.');
        }

        return $next($request);
    }
}
