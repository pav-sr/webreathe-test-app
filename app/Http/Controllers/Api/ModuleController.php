<?php

namespace App\Http\Controllers\Api;

use App\Enums\ModuleStatus;
use App\Http\Resources\ModuleCollection;
use App\Http\Resources\ModuleFailedCollection;
use App\Http\Resources\ModuleResource;
use App\Models\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class ModuleController extends BaseController
{
    // JsonResponse is used for simplifying. We need to use resources in
    // real application
    public function getAll(): JsonResponse
    {
        $modules = Module::all();

        return response()->json(new ModuleCollection($modules));
    }

    public function getOne(Module $module): JsonResponse
    {
        return response()->json(new ModuleResource($module));
    }

    public function getFailed(): JsonResponse
    {
        $modules = Module::where('status', ModuleStatus::Failed)->get();

        return response()->json(new ModuleFailedCollection($modules));
    }
}
