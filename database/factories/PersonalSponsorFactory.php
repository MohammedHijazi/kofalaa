<?php

namespace Database\Factories;

use App\Models\Sponsor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PersonalSponsorFactory extends Factory
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
            'governorate' => $this->faker->city,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'street' => $this->faker->streetName,
            'phone' => $this->faker->phoneNumber,
            'mobile' => $this->faker->phoneNumber,
            'nationality'=>$this->faker->country,
            'id_number'=>$this->faker->unique()->numberBetween([000000000,999999999]),
            'id_type'=>$this->faker->randomElement(['id','passport']),


        ];
    }
}
