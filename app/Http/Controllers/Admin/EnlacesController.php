<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEnlaceRequest;
use App\Http\Requests\StoreEnlaceRequest;
use App\Http\Requests\UpdateEnlaceRequest;
use App\Models\Enlace;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnlacesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enlace_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enlaces = Enlace::all();

        return view('admin.enlaces.index', compact('enlaces'));
    }

    public function create()
    {
        abort_if(Gate::denies('enlace_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enlaces.create');
    }

    public function store(StoreEnlaceRequest $request)
    {
        $enlace = Enlace::create($request->all());

        return redirect()->route('admin.enlaces.index');
    }

    public function edit(Enlace $enlace)
    {
        abort_if(Gate::denies('enlace_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
     
        return view('admin.enlaces.edit', compact('enlace'));
    }

    public function update(UpdateEnlaceRequest $request, Enlace $enlace)
    {
        $enlace->update($request->all());

        return redirect()->route('admin.enlaces.index');
    }

    public function show(Enlace $enlace)
    {
        abort_if(Gate::denies('enlace_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enlaces.show', compact('enlace'));
    }

    public function destroy(Enlace $enlace)
    {
        abort_if(Gate::denies('enlace_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enlace->delete();

        return back();
    }

    public function massDestroy(MassDestroyEnlaceRequest $request)
    {
        $enlaces = Enlace::find(request('ids'));

        foreach ($enlaces as $enlace) {
            $enlace->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
