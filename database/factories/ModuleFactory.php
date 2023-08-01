<?php

namespace Database\Factories;

use App\Enums\ModuleStatus;
use App\Enums\ModuleType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = array_map(function (ModuleType $type) {
            return $type->value;
        }, ModuleType::cases());

        return [
            'name' => fake()->uuid(),
            'type' => $types[mt_rand(0, count($types) - 1)],
            'value' => 0.0,
            'status' => ModuleStatus::Ok,
        ];
    }
}
