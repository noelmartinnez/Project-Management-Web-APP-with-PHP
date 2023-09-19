<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role->name !== "Admin") {
            abort(403, 'No tienes autorización para acceder a esta página. Permiso denegado.');
        }

        return $next($request);
    }
}
