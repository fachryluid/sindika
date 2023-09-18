<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'stock_id' => Stock::factory(),
          'quantity_sold' => fake()->numberBetween(30, 80),
          'date' => fake()->date(),
          'month' => fake()->month(),
          'year' => fake()-> year()
        ];
    }
}
