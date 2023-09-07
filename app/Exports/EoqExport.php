<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EoqExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $eoqs;
    
    public function __construct($eoqs)
    {
        $this->eoqs = $eoqs;
    }
    public function collection()
    {
        return $this->eoqs;
    }

    public function headings(): array
    {
        return [
            'Nama Obat',
            'Jumlah Kebutuhan Obat/Tahun',
            'Harga',
            'Biaya Pesan',
            'Biaya Simpan',
            'EOQ',
            'Frekuensi Pemesanan',
            'Total Biaya Pesan', 
            'Total Biaya Simpan',
            'Total Biaya Persediaan',
            'Safety Stock',
            'Reorder Point',
            'Lead Time / Waktu Tunggu Obat'
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
                    'wrapText' => true
                ],
            ],
        ];
    }
}
