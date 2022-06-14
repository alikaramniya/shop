<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName,
            'lastName' => $this->faker->lastName,
            'image' => 'https://picsum.photos/' . rand(190, 200) . rand(290, 300),
            'address' => $this->faker->address
        ];
    }
}
