<?php

namespace Database\Factories;

use App\Models\Treasury;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treasury>
 */
class TreasuryDeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $treasury = Treasury::where('id', '!=', 1)->inRandomOrder()->first();

        return [
            'treasury_id' => 1,
            'treasuries_can_delivery' => $treasury?->id, // null-safe
            'created_by' => 1,
            'com_code' => 1,
        ];
    }
}