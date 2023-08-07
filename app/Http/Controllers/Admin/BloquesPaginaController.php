<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBloquesPaginaRequest;
use App\Http\Requests\StoreBloquesPaginaRequest;
use App\Http\Requests\UpdateBloquesPaginaRequest;
use App\Models\BloquesPagina;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BloquesPaginaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bloques_pagina_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bloquesPaginas = BloquesPagina::all();

        return view('admin.bloquesPaginas.index', compact('bloquesPaginas'));
    }

    public function create()
    {
        abort_if(Gate::denies('bloques_pagina_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bloquesPaginas.create');
    }

    public function store(StoreBloquesPaginaRequest $request)
    {
        $bloquesPagina = BloquesPagina::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bloquesPagina->id]);
        }

        return redirect()->route('admin.bloques-paginas.index');
    }

    public function edit(BloquesPagina $bloquesPagina)
    {
        abort_if(Gate::denies('bloques_pagina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bloquesPaginas.edit', compact('bloquesPagina'));
    }

    public function update(UpdateBloquesPaginaRequest $request, BloquesPagina $bloquesPagina)
    {
        $bloquesPagina->update($request->all());

        return redirect()->route('admin.bloques-paginas.index');
    }

    public function show(BloquesPagina $bloquesPagina)
    {
        abort_if(Gate::denies('bloques_pagina_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bloquesPaginas.show', compact('bloquesPagina'));
    }

    public function destroy(BloquesPagina $bloquesPagina)
    {
        abort_if(Gate::denies('bloques_pagina_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bloquesPagina->delete();

        return back();
    }

    public function massDestroy(MassDestroyBloquesPaginaRequest $request)
    {
        $bloquesPaginas = BloquesPagina::find(request('ids'));

        foreach ($bloquesPaginas as $bloquesPagina) {
            $bloquesPagina->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bloques_pagina_create') && Gate::denies('bloques_pagina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BloquesPagina();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
