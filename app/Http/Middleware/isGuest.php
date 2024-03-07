<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class isGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // cek kalau di authnya uda ada hostory login, dia gabole masuk ke login lg bakal di redirect balik ke todo
        if (Auth::check()) {
            return redirect('/dashboard')->with('notAllowed', 'Anda sudah login!');
        }
        // kalau gaada history login, baru boleh next ke login
        return $next($request);
    }
}
