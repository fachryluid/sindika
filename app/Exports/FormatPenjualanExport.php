<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FormatPenjualanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
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
    
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'e0e0e0',
                    ],
                ],
                'borders' => [
                    'bottom' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'wrapText' => true
                ],
            ],
        ];
    }
}
