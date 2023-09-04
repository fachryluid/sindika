<?php

namespace App\Imports;

use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SalesImport implements ToCollection
{
  /**
   * @param Collection $collection
   */
  public function collection(Collection $rows)
  {
    $salesData = collect([]);

    foreach ($rows as $key => $row) {
      if ($key === 0) {
        continue; // Skip the header row
      }

      $salesItem = [];
      for ($i = 3; $i < count($row); $i++) {
        $salesItem[] = (object) [
          "date" => $rows[0][$i],
          "sold" => $row[$i],
        ];
      }

      $salesData->push((object) [
        "uuid" => $rows[$key][0],
        "medicine" => $rows[$key][1],
        "supplier" => $rows[$key][2],
        "sales" => $salesItem,
      ]);
    }

    foreach ($salesData as $sale) {
      $stock_id = Stock::where('uuid', $sale->uuid)->get('id');
      dd($stock_id);
    }
  }
}
