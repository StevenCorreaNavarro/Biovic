<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeesMiddleware
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role !== 'Empleado'&& $request->user()->role !== 'Admin') {
            return redirect('/'); // Redireccionar a la página principal o a una página de acceso denegado
        }
    
        return $next($request);
    }
}
