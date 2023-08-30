<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $med1 = [
        (object) [
          'month' => 6,
          'year' => 2022,
          'sold' => 65
        ],
        (object) [
          'month' => 7,
          'year' => 2022,
          'sold' => 45
        ],
        (object) [
          'month' => 8,
          'year' => 2022,
          'sold' => 44
        ],
        (object) [
          'month' => 9,
          'year' => 2022,
          'sold' => 57
        ],
        (object) [
          'month' => 10,
          'year' => 2022,
          'sold' => 60
        ],
        (object) [
          'month' => 11,
          'year' => 2022,
          'sold' => 42
        ],
        (object) [
          'month' => 12,
          'year' => 2022,
          'sold' => 30
        ],
        (object) [
          'month' => 1,
          'year' => 2023,
          'sold' => 38
        ],
        (object) [
          'month' => 2,
          'year' => 2023,
          'sold' => 46
        ],
        (object) [
          'month' => 3,
          'year' => 2023,
          'sold' => 34
        ],
        (object) [
          'month' => 4,
          'year' => 2023,
          'sold' => 49
        ],
        (object) [
          'month' => 5,
          'year' => 2023,
          'sold' => 58
        ],
        (object) [
          'month' => 6,
          'year' => 2023,
          'sold' => 56
        ],
      ];
      $med2 = [
        (object) [
          'month' => 6,
          'year' => 2022,
          'sold' => 13
        ],
        (object) [
          'month' => 7,
          'year' => 2022,
          'sold' => 17
        ],
        (object) [
          'month' => 8,
          'year' => 2022,
          'sold' => 10
        ],
        (object) [
          'month' => 9,
          'year' => 2022,
          'sold' => 19
        ],
        (object) [
          'month' => 10,
          'year' => 2022,
          'sold' => 18
        ],
        (object) [
          'month' => 11,
          'year' => 2022,
          'sold' => 24
        ],
        (object) [
          'month' => 12,
          'year' => 2022,
          'sold' => 23
        ],
        (object) [
          'month' => 1,
          'year' => 2023,
          'sold' => 27
        ],
        (object) [
          'month' => 2,
          'year' => 2023,
          'sold' => 20
        ],
        (object) [
          'month' => 3,
          'year' => 2023,
          'sold' => 17
        ],
        (object) [
          'month' => 4,
          'year' => 2023,
          'sold' => 24
        ],
        (object) [
          'month' => 5,
          'year' => 2023,
          'sold' => 19
        ],
        (object) [
          'month' => 6,
          'year' => 2023,
          'sold' => 18
        ],
      ];
      foreach ($med1 as $key) {
        Sale::factory()->create([
          'stock_id' => 1,
          'month' => $key->month,
          'year' => $key->year,
          'quantity_sold' => $key->sold
        ]);
      }
      foreach ($med2 as $key) {
        Sale::factory()->create([
          'stock_id' => 2,
          'month' => $key->month,
          'year' => $key->year,
          'quantity_sold' => $key->sold
        ]);
      }
    }
}
