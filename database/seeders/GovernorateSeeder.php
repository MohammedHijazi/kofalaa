<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $governorates = array(
            'القدس',
            'بيت لحم',
            'الخليل',
            'رام الله والليرة',
            'نابلس',
            'سلفيت',
            'قلقيلية',
            'طولكرم',
            'طوباس',
            'جنين',
            'اريحا والأغوار',
            'شمال غزة',
            'غزة',
            'الوسطى',
            'خان يونس',
            'رفح'
            );

        foreach ($governorates as $governorate) {
            Governorate::create([
                'name' => $governorate,
                'country_id' => 187
            ]);
        }
    }
}
