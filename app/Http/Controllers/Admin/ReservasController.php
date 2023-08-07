<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReservaRequest;
use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Cliente;
use App\Models\EstatusReserva;
use App\Models\PrestadoresDeServicio;
use App\Models\Reserva;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reserva_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservas = Reserva::with(['cliente', 'prestado_de_servicio', 'estatus_reserva'])->get();

        $clientes = Cliente::get();

        $prestadores_de_servicios = PrestadoresDeServicio::get();

        $estatus_reservas = EstatusReserva::get();

        return view('admin.reservas.index', compact('clientes', 'estatus_reservas', 'prestadores_de_servicios', 'reservas'));
    }

    public function create()
    {
        abort_if(Gate::denies('reserva_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::pluck('nombres', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prestado_de_servicios = PrestadoresDeServicio::pluck('nombre_razon_social', 'id')->prepend(trans('global.pleaseSelect'), '');

        $estatus_reservas = EstatusReserva::pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reservas.create', compact('clientes', 'estatus_reservas', 'prestado_de_servicios'));
    }

    public function store(StoreReservaRequest $request)
    {
        $reserva = Reserva::create($request->all());

        return redirect()->route('admin.reservas.index');
    }

    public function edit(Reserva $reserva)
    {
        abort_if(Gate::denies('reserva_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::pluck('nombres', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prestado_de_servicios = PrestadoresDeServicio::pluck('nombre_razon_social', 'id')->prepend(trans('global.pleaseSelect'), '');

        $estatus_reservas = EstatusReserva::pluck('descripcion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reserva->load('cliente', 'prestado_de_servicio', 'estatus_reserva');

        return view('admin.reservas.edit', compact('clientes', 'estatus_reservas', 'prestado_de_servicios', 'reserva'));
    }

    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
        $reserva->update($request->all());

        return redirect()->route('admin.reservas.index');
    }

    public function show(Reserva $reserva)
    {
        abort_if(Gate::denies('reserva_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reserva->load('cliente', 'prestado_de_servicio', 'estatus_reserva');

        return view('admin.reservas.show', compact('reserva'));
    }

    public function destroy(Reserva $reserva)
    {
        abort_if(Gate::denies('reserva_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reserva->delete();

        return back();
    }

    public function massDestroy(MassDestroyReservaRequest $request)
    {
        $reservas = Reserva::find(request('ids'));

        foreach ($reservas as $reserva) {
            $reserva->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
