<?php

namespace Database\Factories;

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
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'contact_person' => $this->faker->name,
            'primary_phone' => $this->faker->phoneNumber,
            'secondary_phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'country' => $this->faker->country,
            'password' => null,
        ];
    }
}
