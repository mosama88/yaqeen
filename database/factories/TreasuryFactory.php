<?php

namespace Database\Factories;

use App\Enums\Treasury\TreasuryIsMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treasury>
 */
class TreasuryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = 'خزنة كاشير ';
        static $number = 1;
        static $numberPayment = 1;
        static $numberCollection = 1;

        return [
            'name' => $name  .  $number++,
            'is_master' => TreasuryIsMaster::SubBranch->value,
            'last_payment_receipt' => $numberPayment++,
            'last_collection_receipt' => $numberCollection++,
            'created_by' => 1,
            'com_code' => 1,
        ];
    }
}