<?php

namespace App\Services;

use App\Http\Requests\ModulePostRequest;
use App\Models\Module;

class SaveModuleService
{
    /**
     * @throws \Throwable
     */
    public function save(ModulePostRequest $request): void
    {
        $module = new Module();

        $name = $request->input('name');
        $type = $request->input('type');

        $module->name = $name;
        $module->type = $type;

        $module->saveOrFail();
    }
}
