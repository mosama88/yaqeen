<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminPanelSetting;

class AdminPanelSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        AdminPanelSetting::create([
            'company_name' => 'يقين للتجاره',
            'phone' => '01550565699',
            'email' => 'info@yaqeen.com',
            'address' => '8 ش عمرو بن العاص - المعادي - القاهرة',
            'created_by' => 1,
            'com_code' => 1,
        ]);
    }
}