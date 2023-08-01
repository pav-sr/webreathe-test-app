<?php

namespace App\Listeners;

use App\Events\ModuleUpdating;
use App\Models\HistoryItem;

class SaveHistory
{
    /**
     * Handle ModuleUpdating event for history generation
     */
    public function handle(ModuleUpdating $event): void
    {
        $module = $event->getModule();

        $historyItem = new HistoryItem();
        $historyItem->value = $module->value;
        $historyItem->status = $module->status->value;
        $historyItem->created_at = new \DateTime();
        $historyItem->module()->associate($module);

        $historyItem->saveOrFail();
    }
}
