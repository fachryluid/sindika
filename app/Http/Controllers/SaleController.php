<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Stock;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FormatPenjualanExport;
use App\Imports\SalesImport;

class SaleController extends Controller
{
  public function index()
  {
    $medicines = Medicine::with('stocks.sales')->get();
    // dd($medicines->toArray());
    return view('dashboard.master.sale.index', compact('medicines'));
  }

  public function cetak_format(Request $request)
  {
    try {
      $startDate = Carbon::parse($request->start_date);
      $finishDate = Carbon::parse($request->finish_date);
      $totalMonth = $finishDate->diffInMonths($startDate);

      if ($totalMonth === 0) {
        throw new \Exception('Tanggal selesai harus setelah tanggal mulai');
      }

      $months = collect([]);
      $currentDate = $startDate->copy();
      while ($currentDate->lte($finishDate)) {
        $formattedDate = $currentDate->format('m-d-Y');
        $months->push($formattedDate);
        $currentDate->addMonth();
      }

      $stocks = Stock::with(['medicine', 'supplier'])->get();

      $salesData = collect([]);

      foreach ($stocks as $stock) {
        $sale = (object) [
          'uuid' => $stock->uuid,
          'medicine' => $stock->medicine->name,
          'supplier' => $stock->supplier->name
        ];
        $salesData->push($sale);
      }

      return Excel::download(new FormatPenjualanExport($salesData, $months), date("d-m-Y-H-i-s") . '-Format-Penjualan.xlsx');
    } catch (\Exception $e) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan', $e->getMessage()]]);
    }
  }

  public function import(Request $request)
  {
    try {
      if (!isset($request->files)) {
        throw new \Exception("File tidak ditemukan!");
      }
      $sales = Excel::import(new SalesImport, $request->file);
      dump('tesatyts');
      dd($sales);
    } catch (\Exception $e) {
      dd($e);
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan', $e->getMessage()]]);
    }
  }
}
