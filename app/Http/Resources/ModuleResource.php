<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $seconds = 0;

        $historyItems = $this->history();

        if ($historyItems->count() > 0) {
            $dateBegin = new \DateTime($historyItems->first()->created_at);
            $dateEnd = new \DateTime(
                $historyItems->latest()->first()->created_at
            );

            $diff = $dateEnd->diff($dateBegin);
            $daysInSecs = $diff->format('%r%a') * 24 * 60 * 60;
            $hoursInSecs = $diff->h * 60 * 60;
            $minsInSecs = $diff->i * 60;

            $seconds = $daysInSecs + $hoursInSecs + $minsInSecs + $diff->s;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'status' => $this->status,
            'value' => $this->value,
            'data_items' => $historyItems->count(),
            'time' => $seconds,
        ];
    }
}
