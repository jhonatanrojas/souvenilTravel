<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClienteRequest;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaquetesController extends Controller
{
    public function index()
    {
      //  abort_if(Gate::denies('cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $products= Product::with('prestador_servicios', 'estado', 'destino', 'tags', 'category')
      ->where('category_id',1)
      ->paginate(10);

      $viewHome =  'frontend.paquetes.index';
      $layoutPage = 'lista_paquetes_turistico';

      return view(
          $viewHome,
          array(
              'title'       => 'Inicio',
              'keyword'     => 'palablas clave',
              'description' => 'descripcion',
              'products'=>$products,
              'layout_page' => $layoutPage,
          )
      );
    }



    public function show($id)
    {
      
        $viewHome =  'frontend.paquetes.paquete';
        $layoutPage = 'paquete_turistico';
        $product= Product::with('prestador_servicios', 'estado', 'destino', 'tags', 'category')->find($id);

        return view(
            $viewHome,
            array(
                'title'       => 'Inicio',
                'keyword'     => 'palablas clave',
                'description' => 'descripcion',
                'product'=>$product,
                'layout_page' => $layoutPage,
            )
        );

    }

   
}
