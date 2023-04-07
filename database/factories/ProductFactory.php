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
            'type' => $this->faker->randomElement(['alpha', 'beta', 'gamma']),
            'name' => $this->faker->name(),
            'model_no' => $this->faker->randomNumber(6, true),
            'start_date' => $this->faker->randomElement(['myanmar', 'Japan', 'Germany', 'Thailand', 'Russia', 'China']),
            'manufactured_year' => $this->faker->date('Y-m-d'),
            'usage' => $this->faker->text(50),
            'start_date' => $this->faker->date('Y-m-d'),
            'description' => $this->faker->text(100),
            'image' => 'fire.jpg',
            'publish' => '0',
        ];
    }
}
