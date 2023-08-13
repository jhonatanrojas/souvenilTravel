<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClienteRequest;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientesController extends Controller
{
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

    public function show(Cliente $cliente)
    {
        $viewHome =  'frontend.clientes.perfil';
        $layoutPage = 'perfil_cliente';

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

   
}
