<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(5),
            'count' => $this->faker->numberBetween(1, 30),
            'image' => 'https://picsum.photos/' . rand(190, 200) . rand(290, 300),
            'price' => $this->faker->numberBetween(1000, 10000) * 5000,
            'demo' => $this->faker->text(50),
            'description' => $this->faker->text(100)
        ];
    }
}
