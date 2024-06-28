<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubCategoriumRequest;
use App\Http\Requests\StoreSubCategoriumRequest;
use App\Http\Requests\UpdateSubCategoriumRequest;
use App\Models\ProductCategory;
use App\Models\SubCategorium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCategoriaController extends Controller
{
    public function index()
    {
 

        $subCategoria = SubCategorium::with(['categoria'])->get();

        return view('admin.subCategoria.index', compact('subCategoria'));
    }

    public function create()
    {
;

        $categorias = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subCategoria.create', compact('categorias'));
    }

    public function store(StoreSubCategoriumRequest $request)
    {
 
        $subCategorium = SubCategorium::create($request->all());

        return redirect()->route('admin.sub-categoria.index');
    }

    public function edit(SubCategorium $subCategorium)
    {
    

        $categorias = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subCategorium->load('categoria');

        return view('admin.subCategoria.edit', compact('categorias', 'subCategorium'));
    }

    public function update(UpdateSubCategoriumRequest $request, SubCategorium $subCategorium)
    {
        $subCategorium->update($request->all());

        return redirect()->route('admin.sub-categoria.index');
    }

    public function show(SubCategorium $subCategorium)
    {
     

        $subCategorium->load('categoria', 'subCategoriaProducts');

        return view('admin.subCategoria.show', compact('subCategorium'));
    }

    public function destroy(SubCategorium $subCategorium)
    {
     

        $subCategorium->delete();

        return back();
    }

    public function massDestroy(MassDestroySubCategoriumRequest $request)
    {
        $subCategoria = SubCategorium::find(request('ids'));

        foreach ($subCategoria as $subCategorium) {
            $subCategorium->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
 