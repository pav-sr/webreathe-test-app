<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModulePostRequest;
use App\Models\Module;
use App\Services\SaveModuleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class ModuleController extends BaseController
{
    public function show(Module $module): View
    {
        return view('modules.show', ['module' => $module]);
    }

    public function create(
        ModulePostRequest $request,
        SaveModuleService $saveModuleService
    ): RedirectResponse {
        if ($request->validated()) {
            $saveModuleService->save($request);
        }

        return redirect()->route('modules-list');
    }
}
