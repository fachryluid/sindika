<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormatPenjualanExport implements FromCollection, WithHeadings
{
    protected $salesData;
    protected $months;

    public function __construct($salesData, $months)
    {
        $this->salesData = $salesData;
        $this->months = $months;
    }
    public function collection()
    {
      return $this->salesData;
    }

    public function headings(): array
    {
      $headings = array_merge(['UUID', 'Obat', 'Supplier'], $this->months->toArray());
      return $headings;
    }
}
