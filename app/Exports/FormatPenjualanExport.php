<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class FormatPenjualanExport implements FromCollection
{
    protected $salesData;

    public function __construct($salesData)
    {
        $this->salesData = $salesData;
    }
    public function collection()
    {
      return $this->salesData;
    }
}
