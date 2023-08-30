<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
      // $this->call(UnitSeeder::class);
      // $this->call(TypeSeeder::class);
      // $this->call(CategorySeeder::class);
      // $this->call(SupplierSeeder::class);
      // $this->call(MedicineSeeder::class);
      $this->call(StockSeeder::class);
      $this->call(SaleSeeder::class);
    }
}
