<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteMiddleware
{
    public function handle($request, Closure $next)
    {
        $userId = session('user_id');
        $userEmail = session('user_email');

        if (true) {
            return $next($request);
        }

        return redirect()->route('registraCliente')->with('error', 'No se encontraron los datos de sesión necesarios');
    }
}





