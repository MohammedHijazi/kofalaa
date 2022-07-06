<?php

namespace Database\Seeders;

use App\Models\InstitutionSponsor;
use App\Models\PersonalSponsor;
use Database\Factories\PersonalSponsorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
         ]);

        PersonalSponsor::factory(10)->create();
        InstitutionSponsor::factory(10)->create();

    }
}
