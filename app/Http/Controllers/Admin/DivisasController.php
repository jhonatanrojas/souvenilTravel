<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDivisaRequest;
use App\Http\Requests\StoreDivisaRequest;
use App\Http\Requests\UpdateDivisaRequest;
use App\Models\Divisa;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DivisasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('divisa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisas = Divisa::all();

        return view('admin.divisas.index', compact('divisas'));
    }

    public function create()
    {
        abort_if(Gate::denies('divisa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.divisas.create');
    }

    public function store(StoreDivisaRequest $request)
    {
        $divisa = Divisa::create($request->all());

        return redirect()->route('admin.divisas.index');
    }

    public function edit(Divisa $divisa)
    {
        abort_if(Gate::denies('divisa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.divisas.edit', compact('divisa'));
    }

    public function update(UpdateDivisaRequest $request, Divisa $divisa)
    {
        $divisa->update($request->all());

        return redirect()->route('admin.divisas.index');
    }

    public function show(Divisa $divisa)
    {
        abort_if(Gate::denies('divisa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.divisas.show', compact('divisa'));
    }

    public function destroy(Divisa $divisa)
    {
        abort_if(Gate::denies('divisa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisa->delete();

        return back();
    }

    public function massDestroy(MassDestroyDivisaRequest $request)
    {
        $divisas = Divisa::find(request('ids'));

        foreach ($divisas as $divisa) {
            $divisa->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
