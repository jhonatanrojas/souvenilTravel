<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPagoRequest;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use App\Models\Pago;
use App\Models\Reserva;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PagosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pago_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pagos = Pago::with(['reserva'])->get();

        return view('admin.pagos.index', compact('pagos'));
    }

    public function create()
    {
        abort_if(Gate::denies('pago_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservas = Reserva::pluck('nro_reserva', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pagos.create', compact('reservas'));
    }

    public function store(StorePagoRequest $request)
    {
        $pago = Pago::create($request->all());

        return redirect()->route('admin.pagos.index');
    }

    public function edit(Pago $pago)
    {
        abort_if(Gate::denies('pago_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservas = Reserva::pluck('nro_reserva', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pago->load('reserva');

        return view('admin.pagos.edit', compact('pago', 'reservas'));
    }

    public function update(UpdatePagoRequest $request, Pago $pago)
    {
        $pago->update($request->all());

        return redirect()->route('admin.pagos.index');
    }

    public function show(Pago $pago)
    {
        abort_if(Gate::denies('pago_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pago->load('reserva');

        return view('admin.pagos.show', compact('pago'));
    }

    public function destroy(Pago $pago)
    {
        abort_if(Gate::denies('pago_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pago->delete();

        return back();
    }

    public function massDestroy(MassDestroyPagoRequest $request)
    {
        $pagos = Pago::find(request('ids'));

        foreach ($pagos as $pago) {
            $pago->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
