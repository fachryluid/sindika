<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WmaExport implements WithMultipleSheets
{
    use Exportable;

    protected $periodes;
    protected $wma2Periode;
    protected $wma3Periode;
    protected $wma4Periode;
    
    public function __construct($wma2Periode, $wma3Periode, $wma4Periode)
    {
        $this->periodes = [
            '2 Periode' => $wma2Periode,
            '3 Periode' => $wma3Periode, 
            '4 Periode' => $wma4Periode
        ];
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->periodes as $key => $periode) {
            $sheets[] = new WmaPerPeriode($key, $periode);
        }
        return $sheets;
    }
}

class WmaPerPeriode implements FromArray, WithTitle, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $key;
    protected $periode;

    public function __construct($key, $periode)
    {
        $this->key = $key;
        $this->periode = $periode;
    }
    public function array(): array
    {
        $data = $this->periode->wmaPeriodeCalc;
        $data[count($data)] = (object) [
            "date" => "NEXT MONTH",
            "quantitySold" => "?",
            "ft" => $this->periode->wmaPeriodeResult->nextFt,
            "error" => "JUMLAH",
            "absError" => $this->periode->wmaPeriodeResult->totalError,
            "squareError" => $this->periode->wmaPeriodeResult->totalSquareError,
            "percentError" => $this->periode->wmaPeriodeResult->totalPercentError
        ];
        $data[count($data)] = (object) [
            "date" => null,
            "quantitySold" => null,
            "ft" => null,
            "error" => null,
            "absError" => $this->periode->wmaPeriodeResult->MAD,
            "squareError" => $this->periode->wmaPeriodeResult->MSE,
            "percentError" => $this->periode->wmaPeriodeResult->MAPE
        ];
        $data[count($data)] = (object) [
            "date" => null,
            "quantitySold" => null,
            "ft" => null,
            "error" => null,
            "absError" => "MAD",
            "squareError" => "MSE",
            "percentError" => "MAPE"
        ];
        return $data;
    }

    public function title(): string
    {
        return $this->key;
    }

    public function headings(): array
    {
        return [
            'Bulan/Tahun',
            'Penjualan Aktual',
            'Ramalan '.$this->key,
            'Error',
            '[Error]',
            'Error^2',
            '% Error'
        ];
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
                ],
            ],
            14 => [
                'borders' => [
                    'bottom' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ]
            ],
            'D14' => [
                'font' => ['bold' => true],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
            'E16:G16' => [
                'font' => ['bold' => true],
            ],
            'B14' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                ],
            ],
            'D14:G14' => [
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'e0e0e0',
                    ],
                ]
            ]
        ];
    }
}
