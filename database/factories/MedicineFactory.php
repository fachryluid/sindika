<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unit;
use App\Models\Type;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'name' => $this->faker->word,
        'image' => $this->faker->imageUrl(),
        'unit_id' => Unit::factory(),
        'type_id' => Type::factory(),
        'category_id' => Category::factory()
      ];
    }
}
