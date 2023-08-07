<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDestinoRequest;
use App\Http\Requests\StoreDestinoRequest;
use App\Http\Requests\UpdateDestinoRequest;
use App\Models\Destino;
use App\Models\Estado;
use App\Models\Municipio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DestinosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('destino_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destinos = Destino::with(['codigo_municipio', 'codigo_estado'])->get();

        return view('admin.destinos.index', compact('destinos'));
    }

    public function create()
    {
        abort_if(Gate::denies('destino_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codigo_municipios = Municipio::pluck('codigo_municipio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $codigo_estados = Estado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.destinos.create', compact('codigo_estados', 'codigo_municipios'));
    }

    public function store(StoreDestinoRequest $request)
    {
        $destino = Destino::create($request->all());

        return redirect()->route('admin.destinos.index');
    }

    public function edit(Destino $destino)
    {
        abort_if(Gate::denies('destino_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codigo_municipios = Municipio::pluck('codigo_municipio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $codigo_estados = Estado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destino->load('codigo_municipio', 'codigo_estado');

        return view('admin.destinos.edit', compact('codigo_estados', 'codigo_municipios', 'destino'));
    }

    public function update(UpdateDestinoRequest $request, Destino $destino)
    {
        $destino->update($request->all());

        return redirect()->route('admin.destinos.index');
    }

    public function show(Destino $destino)
    {
        abort_if(Gate::denies('destino_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destino->load('codigo_municipio', 'codigo_estado');

        return view('admin.destinos.show', compact('destino'));
    }

    public function destroy(Destino $destino)
    {
        abort_if(Gate::denies('destino_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destino->delete();

        return back();
    }

    public function massDestroy(MassDestroyDestinoRequest $request)
    {
        $destinos = Destino::find(request('ids'));

        foreach ($destinos as $destino) {
            $destino->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
