<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIdiomaRequest;
use App\Http\Requests\StoreIdiomaRequest;
use App\Http\Requests\UpdateIdiomaRequest;
use App\Models\Idioma;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdiomasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('idioma_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idiomas = Idioma::all();

        return view('admin.idiomas.index', compact('idiomas'));
    }

    public function create()
    {
        abort_if(Gate::denies('idioma_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.idiomas.create');
    }

    public function store(StoreIdiomaRequest $request)
    {
        $idioma = Idioma::create($request->all());

        return redirect()->route('admin.idiomas.index');
    }

    public function edit(Idioma $idioma)
    {
        abort_if(Gate::denies('idioma_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.idiomas.edit', compact('idioma'));
    }

    public function update(UpdateIdiomaRequest $request, Idioma $idioma)
    {
        $idioma->update($request->all());

        return redirect()->route('admin.idiomas.index');
    }

    public function show(Idioma $idioma)
    {
        abort_if(Gate::denies('idioma_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.idiomas.show', compact('idioma'));
    }

    public function destroy(Idioma $idioma)
    {
        abort_if(Gate::denies('idioma_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idioma->delete();

        return back();
    }

    public function massDestroy(MassDestroyIdiomaRequest $request)
    {
        $idiomas = Idioma::find(request('ids'));

        foreach ($idiomas as $idioma) {
            $idioma->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
