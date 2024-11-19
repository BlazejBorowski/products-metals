<?php

namespace Database\Factories;

use App\Enums\Metal;
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
    public function definition(): array
    {
        $metals = Metal::values();

        return [
            'name' => $this->faker->word,
            'metal' => $this->faker->randomElement($metals),
            'weight' => $this->faker->numberBetween(1, 1000),
            'change_percent' => $this->faker->numberBetween(0, 100),
        ];
    }
}
