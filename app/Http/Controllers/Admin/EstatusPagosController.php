<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEstatusPagoRequest;
use App\Http\Requests\StoreEstatusPagoRequest;
use App\Http\Requests\UpdateEstatusPagoRequest;
use App\Models\EstatusPago;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstatusPagosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('estatus_pago_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estatusPagos = EstatusPago::all();

        return view('admin.estatusPagos.index', compact('estatusPagos'));
    }

    public function create()
    {
        abort_if(Gate::denies('estatus_pago_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estatusPagos.create');
    }

    public function store(StoreEstatusPagoRequest $request)
    {
        $estatusPago = EstatusPago::create($request->all());

        return redirect()->route('admin.estatus-pagos.index');
    }

    public function edit(EstatusPago $estatusPago)
    {
        abort_if(Gate::denies('estatus_pago_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estatusPagos.edit', compact('estatusPago'));
    }

    public function update(UpdateEstatusPagoRequest $request, EstatusPago $estatusPago)
    {
        $estatusPago->update($request->all());

        return redirect()->route('admin.estatus-pagos.index');
    }

    public function show(EstatusPago $estatusPago)
    {
        abort_if(Gate::denies('estatus_pago_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estatusPagos.show', compact('estatusPago'));
    }

    public function destroy(EstatusPago $estatusPago)
    {
        abort_if(Gate::denies('estatus_pago_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estatusPago->delete();

        return back();
    }

    public function massDestroy(MassDestroyEstatusPagoRequest $request)
    {
        $estatusPagos = EstatusPago::find(request('ids'));

        foreach ($estatusPagos as $estatusPago) {
            $estatusPago->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
