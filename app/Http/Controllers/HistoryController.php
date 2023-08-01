<?php

namespace App\Http\Controllers;

use App\Models\HistoryItem;
use App\Models\Module;
use Illuminate\View\View;
use Illuminate\Routing\Controller as BaseController;

class HistoryController extends BaseController
{
    public function showByModule(Module $module): View
    {
        $historyItems = HistoryItem::where('module_id', $module->id)->get();

        $params = !empty($historyItems) && $historyItems->count() > 0 ? [
            'moduleName' => $historyItems[0]->module->name,
            'moduleType' => $historyItems[0]->module->type,
            'items' => $historyItems,
        ] : [];

        return view('modules.history.show', $params);
    }
}
