<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastName(),
            'stock' => $this->faker->randomDigit(),
            'price' => $this->faker->randomDigit(),
            'category' => $this->faker->word(),
            'image' => $this->faker->image(),
            'description' => $this->faker->sentence(10),
        ];
    }
}
