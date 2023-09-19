<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            abort(403, 'Debes loguearte para entrar a esta página. Permiso denegado.');
        }

        return $next($request);
    }
}
