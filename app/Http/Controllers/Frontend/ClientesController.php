<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClienteRequest;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class ClientesController extends Controller
{
    use AuthenticatesUsers;
    
    public function index()
    {
      //  abort_if(Gate::denies('cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::all();

        return view('frontend.clientes.index', compact('clientes'));
    }

    public function create()
    {
      
        $viewHome =  'frontend.clientes.create';
        $layoutPage = 'cliente';

        return view(
            $viewHome,
            array(
                'title'       => 'Inicio',
                'keyword'     => 'palablas clave',
                'description' => 'descripcion',
                'layout_page' => $layoutPage,
            )
        );

    
    }

    public function registrarCliente(Request $request)

    {
        $this->validarRegistro($request);
        $cliente = $this->crearCliente($request);

        $cliente = $this->crearCliente($request);

        if ($cliente) {
            session([
                'user_id' => $cliente->id,
                'user_email' => $cliente->email,
            ]);
            Auth::login($cliente);
            
            return redirect()->route('perfilCliente')->with('success', 'Registro exitoso y sesión iniciada.');
        } else {
            return redirect()->route('registraCliente')->with('error', 'No se pudo completar el registro.');
        }
    }
    
    protected function validarRegistro(Request $request)
    {
        $validaciones = [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'cedula' => 'required|string|max:20',
            'telefono' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                Rule::unique('clientes'),
            ],
            'password' => 'required|min:8|confirmed', // Cambio aquí
        ];

        $mensajes = [
            'nombres.required' => 'El nombre es obligatorio.',
            'nombres.string' => 'El nombre debe ser una cadena de texto.',
            'nombres.max' => 'El nombre no debe exceder 255 caracteres.',
            'apellidos.required' => 'El apellido es obligatorio.',
            'apellidos.string' => 'El apellido debe ser una cadena de texto.',
            'apellidos.max' => 'El apellidos no debe exceder 255 caracteres.',
            'cedula.required' => 'La cedula es obligatoria..',
            'telefono.required' => 'El Telefono es obligatorio..',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Este correo electrónico ya ha sido registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.', // Cambio aquí
        ];
    
        $this->validate($request, $validaciones, $mensajes);
    }
    
    protected function crearCliente(Request $request)
    {

        return Cliente::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $request->remember_token,
        ]);
    }
    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());

        return redirect()->route('admin.clientes.index');
    }

 /*   public function edit(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return redirect()->route('admin.clientes.index');
    }*/

    public function perfilClientes()
{
    $userEmail = session('user_email');
    $cliente = Cliente::where('email', $userEmail)->first();
    if ($cliente && $cliente->id) {
        session(['user_id' => $cliente->id]);
        $data = [
            'title' => 'Perfil de usuario',
            'keyword' => 'palabras clave',
            'description' => 'descripción',
            'layout_page' => 'perfil_cliente',
            'cliente' => $cliente,
        ];
        return view('frontend.clientes.perfil', $data);
    }

    return redirect()->route('registraCliente')->with('error', 'No se encontró el perfil del cliente');
}

   
}
