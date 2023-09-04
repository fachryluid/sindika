<?php

namespace Database\Seeders;

use App\Models\Sale;
use Carbon\Carbon;
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
          'date' => '2023-01-01',
          'month' => 1,
          'year' => 2023,
          'sold' => 38
        ],
        (object) [
          'date' => '2022-06-01',
          'month' => 6,
          'year' => 2022,
          'sold' => 65
        ],
        (object) [
          'date' => '2022-09-01',
          'month' => 9,
          'year' => 2022,
          'sold' => 57
        ],
        (object) [
          'date' => '2022-10-01',
          'month' => 10,
          'year' => 2022,
          'sold' => 60
        ],
        (object) [
          'date' => '2022-11-01',
          'month' => 11,
          'year' => 2022,
          'sold' => 42
        ],
        (object) [
          'date' => '2022-12-01',
          'month' => 12,
          'year' => 2022,
          'sold' => 30
        ],
        (object) [
          'date' => '2023-02-01',
          'month' => 2,
          'year' => 2023,
          'sold' => 46
        ],
        (object) [
          'date' => '2023-06-01',
          'month' => 6,
          'year' => 2023,
          'sold' => 56
        ],
        (object) [
          'date' => '2023-03-01',
          'month' => 3,
          'year' => 2023,
          'sold' => 34
        ],
        (object) [
          'date' => '2022-07-01',
          'month' => 7,
          'year' => 2022,
          'sold' => 45
        ],
        (object) [
          'date' => '2023-04-01',
          'month' => 4,
          'year' => 2023,
          'sold' => 49
        ],
        (object) [
          'date' => '2023-05-01',
          'month' => 5,
          'year' => 2023,
          'sold' => 58
        ],
        (object) [
          'date' => '2022-08-01',
          'month' => 8,
          'year' => 2022,
          'sold' => 44
        ],
      ];
      $med2 = [
        (object) [
          'date' => '2022-06-01',
          'month' => 6,
          'year' => 2022,
          'sold' => 13
        ],
        (object) [
          'date' => '2023-04-01',
          'month' => 4,
          'year' => 2023,
          'sold' => 24
        ],
        (object) [
          'date' => '2022-07-01',
          'month' => 7,
          'year' => 2022,
          'sold' => 17
        ],
        (object) [
          'date' => '2022-08-01',
          'month' => 8,
          'year' => 2022,
          'sold' => 10
        ],
        (object) [
          'date' => '2022-09-01',
          'month' => 9,
          'year' => 2022,
          'sold' => 19
        ],
        (object) [
          'date' => '2022-10-01',
          'month' => 10,
          'year' => 2022,
          'sold' => 18
        ],
        (object) [
          'date' => '2022-11-01',
          'month' => 11,
          'year' => 2022,
          'sold' => 24
        ],
        (object) [
          'date' => '2022-12-01',
          'month' => 12,
          'year' => 2022,
          'sold' => 23
        ],
        (object) [
          'date' => '2023-01-01',
          'month' => 1,
          'year' => 2023,
          'sold' => 27
        ],
        (object) [
          'date' => '2023-02-01',
          'month' => 2,
          'year' => 2023,
          'sold' => 20
        ],
        (object) [
          'date' => '2023-05-01',
          'month' => 5,
          'year' => 2023,
          'sold' => 19
        ],
        (object) [
          'date' => '2023-03-01',
          'month' => 3,
          'year' => 2023,
          'sold' => 17
        ],
        (object) [
          'date' => '2023-06-01',
          'month' => 6,
          'year' => 2023,
          'sold' => 18
        ],
      ];
      foreach ($med1 as $key) {
        Sale::factory()->create([
          'stock_id' => 1,
          'date' => $key->date,
          'month' => $key->month,
          'year' => $key->year,
          'quantity_sold' => $key->sold
        ]);
      }
      foreach ($med2 as $key) {
        Sale::factory()->create([
          'stock_id' => 2,
          'date' => $key->date,
          'month' => $key->month,
          'year' => $key->year,
          'quantity_sold' => $key->sold
        ]);
      }
    }
}
