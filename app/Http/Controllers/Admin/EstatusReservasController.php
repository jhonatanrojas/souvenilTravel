<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEstatusReservaRequest;
use App\Http\Requests\StoreEstatusReservaRequest;
use App\Http\Requests\UpdateEstatusReservaRequest;
use App\Models\EstatusReserva;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstatusReservasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('estatus_reserva_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estatusReservas = EstatusReserva::all();

        return view('admin.estatusReservas.index', compact('estatusReservas'));
    }

    public function create()
    {
        abort_if(Gate::denies('estatus_reserva_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estatusReservas.create');
    }

    public function store(StoreEstatusReservaRequest $request)
    {
        $estatusReserva = EstatusReserva::create($request->all());

        return redirect()->route('admin.estatus-reservas.index');
    }

    public function edit(EstatusReserva $estatusReserva)
    {
        abort_if(Gate::denies('estatus_reserva_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estatusReservas.edit', compact('estatusReserva'));
    }

    public function update(UpdateEstatusReservaRequest $request, EstatusReserva $estatusReserva)
    {
        $estatusReserva->update($request->all());

        return redirect()->route('admin.estatus-reservas.index');
    }

    public function show(EstatusReserva $estatusReserva)
    {
        abort_if(Gate::denies('estatus_reserva_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estatusReservas.show', compact('estatusReserva'));
    }

    public function destroy(EstatusReserva $estatusReserva)
    {
        abort_if(Gate::denies('estatus_reserva_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estatusReserva->delete();

        return back();
    }

    public function massDestroy(MassDestroyEstatusReservaRequest $request)
    {
        $estatusReservas = EstatusReserva::find(request('ids'));

        foreach ($estatusReservas as $estatusReserva) {
            $estatusReserva->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
