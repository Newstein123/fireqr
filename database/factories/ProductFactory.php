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
        $array = ["fire.jpg"];
        return [
            'name' => $this->faker->name(),
            'category_id' => 1,
            'model_no' => $this->faker->randomNumber(6, true),
            'country' => $this->faker->randomElement(['myanmar', 'Japan', 'Germany', 'Thailand', 'Russia', 'China']),
            'company_name' => $this->faker->company(),
            'manufactured_year' => $this->faker->date('Y-m-d'),
            'usage' => $this->faker->text(50),
            'start_date' => $this->faker->date('Y-m-d'),
            'description' => $this->faker->text(100),
            'image' => json_encode($array),
            'qr_name' => generateRandomString(10),
            'publish' => '0',
        ];
    }
}
