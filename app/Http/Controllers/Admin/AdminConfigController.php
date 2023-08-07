<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdminConfigRequest;
use App\Http\Requests\StoreAdminConfigRequest;
use App\Http\Requests\UpdateAdminConfigRequest;
use App\Models\AdminConfig;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminConfigController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_config_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adminConfigs = AdminConfig::all();

        return view('admin.adminConfigs.index', compact('adminConfigs'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin_config_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adminConfigs.create');
    }

    public function store(StoreAdminConfigRequest $request)
    {
        $adminConfig = AdminConfig::create($request->all());

        return redirect()->route('admin.admin-configs.index');
    }

    public function edit(AdminConfig $adminConfig)
    {
        abort_if(Gate::denies('admin_config_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adminConfigs.edit', compact('adminConfig'));
    }

    public function update(UpdateAdminConfigRequest $request, AdminConfig $adminConfig)
    {
        $adminConfig->update($request->all());

        return redirect()->route('admin.admin-configs.index');
    }

    public function show(AdminConfig $adminConfig)
    {
        abort_if(Gate::denies('admin_config_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adminConfigs.show', compact('adminConfig'));
    }

    public function destroy(AdminConfig $adminConfig)
    {
        abort_if(Gate::denies('admin_config_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adminConfig->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdminConfigRequest $request)
    {
        $adminConfigs = AdminConfig::find(request('ids'));

        foreach ($adminConfigs as $adminConfig) {
            $adminConfig->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
