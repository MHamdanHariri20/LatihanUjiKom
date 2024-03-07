<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // cek apakah ada history login di authnya, kalau ada dibolehin lanjut akses laman
        if (Auth::check()) {
            return $next($request);
        }
        // kalau gaada history login bakal diarahin lagi ke login dengan pesan
        return redirect('/login')->with('notAllowed', 'Silahkan login terlebih dahulu!');
    }
}
