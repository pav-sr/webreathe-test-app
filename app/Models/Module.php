<?php

namespace App\Models;

use App\Enums\ModuleStatus;
use App\Enums\ModuleType;
use App\Events\ModuleUpdating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => ModuleStatus::Ok,
        'value' => 0.0,
    ];

    protected $casts = [
        'status' => ModuleStatus::class,
        'type' => ModuleType::class
    ];

    protected $dispatchesEvents = [
        'updating' => ModuleUpdating::class, // for generating history
    ];

    public function history(): HasMany
    {
        return $this->hasMany(HistoryItem::class);
    }
}
