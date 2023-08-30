<?php

namespace Database\Factories;

use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'supplier_id' => Supplier::factory(),
          'medicine_id' => Medicine::factory(),
          'quantity' => 100,
          'order_cost' => 12500,
          'storage_cost' => 750,
          'order_date' => fake()->dateTime(),
          'expected_delivery' => fake()->date(),
          'price' => 15000,
          'expired_date' => fake()->date()
        ];
    }
}
