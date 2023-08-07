<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMunicipioRequest;
use App\Http\Requests\StoreMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;
use App\Models\Estado;
use App\Models\Municipio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MunicipiosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('municipio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipios = Municipio::with(['codigo_estado'])->get();

        return view('admin.municipios.index', compact('municipios'));
    }

    public function create()
    {
        abort_if(Gate::denies('municipio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codigo_estados = Estado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.municipios.create', compact('codigo_estados'));
    }

    public function store(StoreMunicipioRequest $request)
    {
        $municipio = Municipio::create($request->all());

        return redirect()->route('admin.municipios.index');
    }

    public function edit(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codigo_estados = Estado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipio->load('codigo_estado');

        return view('admin.municipios.edit', compact('codigo_estados', 'municipio'));
    }

    public function update(UpdateMunicipioRequest $request, Municipio $municipio)
    {
        $municipio->update($request->all());

        return redirect()->route('admin.municipios.index');
    }

    public function show(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipio->load('codigo_estado', 'codigoMunicipioDestinos');

        return view('admin.municipios.show', compact('municipio'));
    }

    public function destroy(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipio->delete();

        return back();
    }

    public function massDestroy(MassDestroyMunicipioRequest $request)
    {
        $municipios = Municipio::find(request('ids'));

        foreach ($municipios as $municipio) {
            $municipio->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
