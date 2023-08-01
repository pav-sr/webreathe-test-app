<?php

namespace App\Events;

use App\Models\Module;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ModuleUpdating
{
    use Dispatchable, SerializesModels;

    public function __construct(private Module $module) {}

    public function getModule(): Module // used in SaveHistory listener
    {
        return $this->module;
    }
}
