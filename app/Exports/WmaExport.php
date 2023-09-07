<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

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

class WmaPerPeriode implements FromArray
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
        return $this->periode->wmaPeriodeCalc;
    }
}
