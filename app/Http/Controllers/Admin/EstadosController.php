<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEstadoRequest;
use App\Http\Requests\StoreEstadoRequest;
use App\Http\Requests\UpdateEstadoRequest;
use App\Models\Estado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstadosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('estado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estados = Estado::all();

        return view('admin.estados.index', compact('estados'));
    }

    public function create()
    {
        abort_if(Gate::denies('estado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estados.create');
    }

    public function store(StoreEstadoRequest $request)
    {
        $estado = Estado::create($request->all());

        return redirect()->route('admin.estados.index');
    }

    public function edit(Estado $estado)
    {
        abort_if(Gate::denies('estado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estados.edit', compact('estado'));
    }

    public function update(UpdateEstadoRequest $request, Estado $estado)
    {
        $estado->update($request->all());

        return redirect()->route('admin.estados.index');
    }

    public function show(Estado $estado)
    {
        abort_if(Gate::denies('estado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estado->load('codigoEstadoMunicipios', 'codigoEstadoDestinos');

        return view('admin.estados.show', compact('estado'));
    }

    public function destroy(Estado $estado)
    {
        abort_if(Gate::denies('estado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estado->delete();

        return back();
    }

    public function massDestroy(MassDestroyEstadoRequest $request)
    {
        $estados = Estado::find(request('ids'));

        foreach ($estados as $estado) {
            $estado->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
