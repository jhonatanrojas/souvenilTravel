<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDetalleDeReservaRequest;
use App\Http\Requests\StoreDetalleDeReservaRequest;
use App\Http\Requests\UpdateDetalleDeReservaRequest;
use App\Models\DetalleDeReserva;
use App\Models\Product;
use App\Models\Reserva;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetalleDeReservaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('detalle_de_reserva_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detalleDeReservas = DetalleDeReserva::with(['reserva', 'producto'])->get();

        return view('admin.detalleDeReservas.index', compact('detalleDeReservas'));
    }

    public function create()
    {
        abort_if(Gate::denies('detalle_de_reserva_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservas = Reserva::pluck('nro_reserva', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productos = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.detalleDeReservas.create', compact('productos', 'reservas'));
    }

    public function store(StoreDetalleDeReservaRequest $request)
    {
        $detalleDeReserva = DetalleDeReserva::create($request->all());

        return redirect()->route('admin.detalle-de-reservas.index');
    }

    public function edit(DetalleDeReserva $detalleDeReserva)
    {
        abort_if(Gate::denies('detalle_de_reserva_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservas = Reserva::pluck('nro_reserva', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productos = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $detalleDeReserva->load('reserva', 'producto');

        return view('admin.detalleDeReservas.edit', compact('detalleDeReserva', 'productos', 'reservas'));
    }

    public function update(UpdateDetalleDeReservaRequest $request, DetalleDeReserva $detalleDeReserva)
    {
        $detalleDeReserva->update($request->all());

        return redirect()->route('admin.detalle-de-reservas.index');
    }

    public function show(DetalleDeReserva $detalleDeReserva)
    {
        abort_if(Gate::denies('detalle_de_reserva_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detalleDeReserva->load('reserva', 'producto');

        return view('admin.detalleDeReservas.show', compact('detalleDeReserva'));
    }

    public function destroy(DetalleDeReserva $detalleDeReserva)
    {
        abort_if(Gate::denies('detalle_de_reserva_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $detalleDeReserva->delete();

        return back();
    }

    public function massDestroy(MassDestroyDetalleDeReservaRequest $request)
    {
        $detalleDeReservas = DetalleDeReserva::find(request('ids'));

        foreach ($detalleDeReservas as $detalleDeReserva) {
            $detalleDeReserva->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
