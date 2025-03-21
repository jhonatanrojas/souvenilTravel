<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Destino;
use App\Models\Estado;
use App\Models\PrestadoresDeServicio;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\SubCategorium;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['prestador_servicios', 'estado', 'destino', 'tags', 'category', 'media'])->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prestador_servicios = PrestadoresDeServicio::pluck('nombre_razon_social', 'id');

        $estados = Estado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinos = Destino::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ProductTag::pluck('name', 'id');

        $categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $sub_categorias = SubCategorium::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.products.create', compact('categories', 'destinos', 'estados', 'prestador_servicios', 'tags','sub_categorias'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->prestador_servicios()->sync($request->input('prestador_servicios', []));
        $product->tags()->sync($request->input('tags', []));
        foreach ($request->input('photo', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prestador_servicios = PrestadoresDeServicio::pluck('nombre_razon_social', 'id');

        $estados = Estado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinos = Destino::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ProductTag::pluck('name', 'id');
        $sub_categorias = SubCategorium::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('prestador_servicios', 'estado', 'destino', 'tags', 'category');

        return view('admin.products.edit', compact('categories', 'destinos', 'estados','sub_categorias', 'prestador_servicios', 'product', 'tags'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->prestador_servicios()->sync($request->input('prestador_servicios', []));
        $product->tags()->sync($request->input('tags', []));
        if (count($product->photo) > 0) {
            foreach ($product->photo as $media) {
                if (! in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $product->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('prestador_servicios', 'estado', 'destino', 'tags', 'category');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getSubCategories($categoryId)
    {
        $subCategories = SubCategorium::where('categoria_id', $categoryId)->get();
        return response()->json($subCategories);
    }

}
