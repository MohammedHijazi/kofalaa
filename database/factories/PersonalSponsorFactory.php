<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PersonalSponsorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'governorate' => $this->faker->city,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'street' => $this->faker->streetName,
            'phone' => $this->faker->phoneNumber,
            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'nationality'=>$this->faker->country,
            'id_number'=>$this->faker->unique()->numberBetween([000000000,999999999]),
            'id_type'=>$this->faker->randomElement(['id','passport']),

        ];
    }
}
