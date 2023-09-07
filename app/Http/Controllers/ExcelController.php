<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WmaExport;

class ExcelController extends Controller
{
  public function cetak_wma($uuid)
  {
    try {
      $medicine = Medicine::where('uuid', $uuid)->with('stocks.sales')->firstOrFail();
      $wma2Periode = calculateWMA($medicine->stocks, 2);
      $wma3Periode = calculateWMA($medicine->stocks, 3);
      $wma4Periode = calculateWMA($medicine->stocks, 4);
      return Excel::download(new WmaExport($wma2Periode, $wma3Periode, $wma4Periode), date("d-m-Y-H-i-s") . '-WMA.xlsx');
    } catch (\Exception $e) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan', $e->getMessage()]]);
    }
  }
}
