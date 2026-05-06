<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->type !== 'admin') {
            return redirect()->route('home')
                ->with('error', 'No tens permisos per accedir al panell d’administració.');
        }

        return $next($request);
    }
}
