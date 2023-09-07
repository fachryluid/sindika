<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Stock;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        $stocks = Stock::all();

        $totalMedicine = count($medicines);
        $totalStock = 0;
        foreach ($stocks as $stock) {
            $totalStock += $stock->quantity;
        }

        $emptyStock = $medicines
            ->pluck('stocks')
            ->flatten()
            ->filter(function ($stock) {
                $totalSold = 0;
                foreach ($stock->sales as $sale) {
                    $totalSold += $sale->quantity_sold;
                }
                return $stock['quantity'] <= $totalSold;
            })
            ->count();

        $today = Carbon::now();
        $expiredStocks = collect($stocks)->filter(function ($stock) use ($today) {
            return Carbon::parse($stock['expired_date'])->isBefore($today);
        });
        $totalExpiredQuantity = $expiredStocks->sum('quantity');

        return view('dashboard.index', compact('totalMedicine', 'totalStock', 'emptyStock', 'totalExpiredQuantity'));
    }
}
