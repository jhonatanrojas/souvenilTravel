<?php
namespace App\Http\Middleware;

use Closure;
class ClienteMiddleware
{
    public function handle($request, Closure $next)
{
    $userId = session('user_id');
    $userEmail = session('user_email');
    if ($userId !== null || $userEmail !== null) {
        return $next($request);
    }
    return redirect()->route('registraCliente')->with('error', 'No se encontraron los datos de sesión necesarios');
}
}





