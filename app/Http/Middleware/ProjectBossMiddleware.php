<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProjectBossMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ($request->user()->role->name !== "Jefe de proyecto" && $request->user()->role->name !== "Admin")) {
            abort(403, 'No tienes autorización para acceder a esta página. Permiso denegado.');
        }

        return $next($request);
    }
}
