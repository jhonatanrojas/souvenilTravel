<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDestinoRequest;
use App\Http\Requests\StoreDestinoRequest;
use App\Http\Requests\UpdateDestinoRequest;
use App\Models\Destino;
use App\Models\Estado;
use App\Models\Municipio;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DestinosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('destino_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destinos = Destino::with(['codigo_municipio', 'codigo_estado', 'media'])->get();

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

        foreach ($request->input('fhotos', []) as $file) {
            $destino->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('fhotos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $destino->id]);
        }

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

        if (count($destino->fhotos) > 0) {
            foreach ($destino->fhotos as $media) {
                if (! in_array($media->file_name, $request->input('fhotos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $destino->fhotos->pluck('file_name')->toArray();
        foreach ($request->input('fhotos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $destino->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('fhotos');
            }
        }

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

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('destino_create') && Gate::denies('destino_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Destino();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
