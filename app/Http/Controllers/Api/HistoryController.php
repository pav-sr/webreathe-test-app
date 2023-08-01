<?php

namespace App\Http\Controllers\Api;

use App\Models\HistoryItem;
use App\Models\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class HistoryController extends BaseController
{
    // JsonResponse is used for simplifying. We need to use resources in
    // real application
    public function getByModule(Module $module): JsonResponse
    {
        $historyItems = HistoryItem::where('module_id', $module->id)->get();

        return response()->json($historyItems);
    }
}
