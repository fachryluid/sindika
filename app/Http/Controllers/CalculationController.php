<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
  public function eoq()
  {
    $medicines = Medicine::all();
    return view('dashboard.calculation.eoq', compact('medicines'));
  }

  public function wma()
  {
    $medicines = Medicine::all();
    return view('dashboard.calculation.wma', compact('medicines'));
  }

  public function calculate_wma(Request $request)
  {
    try {
      $medicine = Medicine::where('uuid', $request->uuid)->with('stocks.sales')->firstOrFail();
      $sales = $medicine->stocks[0]->sales;
      $wma2Periode = calculateWMA($sales, 2);
      $wma3Periode = calculateWMA($sales, 3);
      $wma4Periode = calculateWMA($sales, 4);
      return view('dashboard.calculation.wma-result', compact('wma2Periode', 'wma3Periode', 'wma4Periode', 'medicine'));
    } catch (\Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menghitung data!', $th->getMessage()]]);
    }
  }
}
