<?php

namespace Database\Factories;

use App\Models\Sponsor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InstitutionSponsorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sponsors = Sponsor::pluck('id')->toArray();
        return [
            'sponsor_id'=>$this->faker->unique()->randomElement($sponsors),
            'address' => $this->faker->address,
            'contact_person' => $this->faker->name,
            'primary_phone' => $this->faker->phoneNumber,
            'secondary_phone' => $this->faker->phoneNumber,
        ];
    }
}
