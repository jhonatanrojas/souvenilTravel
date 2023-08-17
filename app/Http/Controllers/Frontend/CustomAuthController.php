<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class CustomAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/perfilCliente'; // Cambia esto a la ruta deseada después del inicio de sesión

    public function showLoginForm()
    {
        return view('auth.login');  // asume que tienes una vista llamada 'auth.login'
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::guard('cliente')->attempt($credentials)) {
        session([
            'user_password' => $credentials['password'],
            'user_email' => $credentials['email'],
        ]);

        return redirect()->route('perfilCliente');
    }

    return back()->withInput($request->only('email'))->with('error_message', 'Las credenciales proporcionadas no coinciden con nuestros registros.');
}

    public function logout()
    {
        Auth::guard('cliente')->logout();
        session()->forget(['user_id', 'user_email']);
        return redirect('/');  // redirige a la página principal después de cerrar sesión
    }
}




