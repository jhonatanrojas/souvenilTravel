<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrestadoresDeServicioRequest;
use App\Http\Requests\UpdatePrestadoresDeServicioRequest;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\PrestadoresDeServicio;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrestadoresDeServiciosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prestadores_de_servicio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prestadoresDeServicios = PrestadoresDeServicio::with(['estado', 'municipio', 'user_regiter'])->get();

        $estados = Estado::get();

        $municipios = Municipio::get();

        $users = User::get();

        return view('admin.prestadoresDeServicios.index', compact('estados', 'municipios', 'prestadoresDeServicios', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('prestadores_de_servicio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estados = Estado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipios = Municipio::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.prestadoresDeServicios.create', compact('estados', 'municipios'));
    }

    public function store(StorePrestadoresDeServicioRequest $request)
    {
        $prestadoresDeServicio = PrestadoresDeServicio::create($request->all());

        return redirect()->route('admin.prestadores-de-servicios.index');
    }

    public function edit(PrestadoresDeServicio $prestadoresDeServicio)
    {
        abort_if(Gate::denies('prestadores_de_servicio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estados = Estado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipios = Municipio::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prestadoresDeServicio->load('estado', 'municipio', 'user_regiter');

        return view('admin.prestadoresDeServicios.edit', compact('estados', 'municipios', 'prestadoresDeServicio'));
    }

    public function update(UpdatePrestadoresDeServicioRequest $request, PrestadoresDeServicio $prestadoresDeServicio)
    {
        $prestadoresDeServicio->update($request->all());

        return redirect()->route('admin.prestadores-de-servicios.index');
    }

    public function show(PrestadoresDeServicio $prestadoresDeServicio)
    {
        abort_if(Gate::denies('prestadores_de_servicio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prestadoresDeServicio->load('estado', 'municipio', 'user_regiter');

        return view('admin.prestadoresDeServicios.show', compact('prestadoresDeServicio'));
    }
}
