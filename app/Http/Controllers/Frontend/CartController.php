<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClienteRequest;
use App\Http\Requests\StoreReservaClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\DetalleDeReserva;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class CartController extends Controller
{

    public function registrarReserva(StoreReservaClienteRequest $request)
    {


        $carritoCompra = json_decode($request->carritoCompra);


        $total = 0;
        foreach ($carritoCompra as $key => $cart) {
            $total += $cart->price * $cart->quantity;
            # code...
        }


        $cliente = Cliente::create($request->all());
        $maxId = Reserva::max('id') ?? 1;
        $maxId = date('Y-m-d') . "-" . $maxId + 1;



        $data = [
            'nro_reserva' => $maxId,
            'subtotal' => $total,
            'total' => $total,
            'moneda' => 'USD',
            'tasa_de_cambio' => '1',
            'fecha_reserva' => date('d-m-Y'),
            'cliente_id' => $cliente->id,
            'prestado_de_servicio_id' => 1,
            'estatus_reserva_id' => 1
        ];
        $reserva = Reserva::create($data);
        $carTdetail =[];
        foreach ($carritoCompra as $key => $cart) {
            $total += $cart->price * $cart->quantity;

            $dataDetalle = [
                'cant_adultos' => 1,
                'cant_ninos' => 0,
                'fecha_desde' => date('d-m-Y'),
                'fecha_hasta' => date('d-m-Y'),
                'moneda' => 'USD',
                'tasa_de_cambio' => 1,
                'precio' => $cart->price,
                'total' => $cart->price * $cart->quantity,
                'reserva_id' => $reserva->id ,
                'producto_id' => $cart->id
            ];
            $carTdetail[] =$dataDetalle;
            DetalleDeReserva::create($dataDetalle);
        }
    $success = 'La reserva a sido realizada exitosamente';
        return redirect()->route('/reservaExitosa')->with(compact('success','carritoCompra','data','cliente'));
    }

    function reservaExitosa(){
        $viewHome =  'frontend.cart.index';
        $layoutPage = 'carrito_de_compra';
        $viewHome =  'frontend.cart.reservaDetalle';

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
}
