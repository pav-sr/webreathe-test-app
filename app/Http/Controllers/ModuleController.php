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
//            try {
                $saveModuleService->save($request);
//            } catch (\Exception $e) {
//                return back()->withErrors(['exception' => $e->getMessage()]);
//            }
        }

        return redirect()->route('modules-list');
    }
}
