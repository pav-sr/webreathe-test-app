<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
