<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClienteRequest;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaquetesController extends Controller
{
    public function index($id_destino,$id_categoria)


    {

  
        //  abort_if(Gate::denies('cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

   
        $products = Product::with('prestador_servicios', 'estado', 'destino', 'tags', 'category')
        ->where('category_id',$id_categoria)
        ->where('destino_id',$id_destino)
           
            ->paginate(10);
  
            $productCategory= $this->getCategorias($id_destino);

        $viewHome =  'frontend.paquetes.index';
        $layoutPage = 'lista_paquetes_turistico';

        return view(
            $viewHome,
            array(
                'title'       => 'Inicio',
                'productCategory' =>$productCategory,
                'id_destino' =>$id_destino,
                'keyword'     => 'palablas clave',
                'description' => 'descripcion',
                'products' => $products,
                'layout_page' => $layoutPage,
            )
        );
    }

    
    private function getCategorias($id)
    {
       return ProductCategory::with(['media'])
        ->join('products', 'products.category_id', '=', 'product_categories.id')
        ->select('product_categories.description','product_categories.name','product_categories.id')
        ->where('destino_id',$id)
        ->orderBy('orden')
        ->groupBy('product_categories.description','product_categories.name','product_categories.id')
          ->get();
      
    }

    public function listaCategorias($id)
    {



        $productCategory= $this->getCategorias($id);
  
        /*

        $products = Product::with('prestador_servicios', 'estado', 'destino', 'tags', 'category')
            ->where('destino.id',$id)
            ->get();

            dd(  $products);*/
        $viewHome =  'frontend.paquetes.categorias';
        $layoutPage = 'lista_categorias_index';

        return view(
            $viewHome,
            array(
                'title'       => 'Inicio',
                'keyword'     => 'palablas clave',
                'id_destino' => $id,
                'description' => 'descripcion',
                'productCategory' => $productCategory,
                'layout_page' => $layoutPage,
            )
        );
    }

    public function listCarrito(){
        $viewHome =  'frontend.cart.index';
        $layoutPage = 'carrito_de_compra';
        $product = Product::with('prestador_servicios', 'estado', 'destino', 'tags', 'category')->find(1);

        return view(
            $viewHome,
            array(
                'title'       => 'Inicio',
                'keyword'     => 'palablas clave',
                'description' => 'descripcion',
                'product' => $product,
                'layout_page' => $layoutPage,
            )
        );
    }

    public function datosCarrito(){
        $viewHome =  'frontend.cart.payment';
        $layoutPage = 'carrito_de_compra';
    

        return view(
            $viewHome,
            array(
                'title'       => 'Inicio',
                'keyword'     => 'palablas clave',
                'description' => 'descripcion',
            
                'layout_page' => $layoutPage,
            )
        );
    }
    public function show($id)
    {

        $viewHome =  'frontend.paquetes.paquete';
        $layoutPage = 'paquete_turistico';
        $product = Product::with('prestador_servicios', 'estado', 'destino', 'tags', 'category')->find($id);

        return view(
            $viewHome,
            array(
                'title'       => 'Inicio',
                'keyword'     => 'palablas clave',
                'description' => 'descripcion',
                'product' => $product,
                'layout_page' => $layoutPage,
            )
        );
    }
}
