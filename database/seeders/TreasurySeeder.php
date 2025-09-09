<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Treasury;
use App\Enums\Treasury\TreasuryIsMaster;

class TreasurySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Treasury::create([
            'name' => 'الرئيسية',
            'is_master' => TreasuryIsMaster::Main->value,
            'last_payment_receipt' => 0,
            'last_collection_receipt' => 0,
            'created_by' => 1,
            'com_code' => 1,
        ]);
    }
}