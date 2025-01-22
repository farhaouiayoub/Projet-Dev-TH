<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Enums\Role;

/**class Guest
{

     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next

    public function handle(Request $request, Closure $next): Response
    {
        // Vérifiez si l'utilisateur est connecté et a le rôle "Guest"
        if (Auth::check() && Auth::user()->role === Role::Guest) {
            return $next($request); // Autorise l'accès à la route
        }

        // Redirigez vers une autre page si l'utilisateur n'a pas le rôle "Guest"
        return redirect()->route('home'); // Ou une autre page appropriée
    }
}*/
