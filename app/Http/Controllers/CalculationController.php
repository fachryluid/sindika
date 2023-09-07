<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use DateTime;
use Error;

class CalculationController extends Controller
{
  public function eoq()
  {
    try {
      $medicines = Medicine::all();
      $eoqs = collect([]);
      foreach ($medicines as $medicine) {
        $sales = collect([]);
        foreach ($medicine->stocks as $stock) {
          foreach ($stock->sales as $sale) {
            $sales[] = $sale;
          }
        }
        $sortedSales = $sales->sortBy('date')->values();

        // cek data penjualan obat mencukupi 12 bulan
        if (count($sortedSales) >= 12) {
          // ambil data 12 bulan terakhir
          $lastYearSales = array_slice($sortedSales->toArray(), -12);

          // jumlah kebutuhan per tahun
          $_R = 0; // C4
          foreach ($lastYearSales as $item) {
            $_R += $item['quantity_sold'];
          }

          // harga
          $prices = collect($medicine->stocks)->pluck('price');
          $price = $prices->max();

          // biaya pemesanan
          $orderCosts = collect($medicine->stocks)->pluck('order_cost');
          $orderCost = $orderCosts->max(); // E4

          // biaya penyimpanan
          $storageCost = $_R * ($price * 0.1);

          // EOQ
          $_EOQ = sqrt((2 * $_R * $orderCost) / $storageCost); // G4

          // frequensi pemesanan
          $orderFrequency = $_R / $_EOQ;

          // T. biaya pemesanan
          $_O = $orderCost * $orderFrequency;

          // T. biaya penyimpanan
          $_C = ($_EOQ / 2) * $storageCost;

          // Total biaya persediaan
          $stockTotalCost = $_O + $_C;

          // Lead Time
          $orderDate = new DateTime($medicine->stocks[0]->order_date);
          $expectedDelivery = new DateTime($medicine->stocks[0]->expected_delivery);
          $_LT = $expectedDelivery->diff($orderDate)->days;

          // Safety Stock
          $_SS = ($_R / 360) * $_LT;

          // Reorder Point
          $_ROP = 2 * $_SS;

          $eoqs->push((object) [
            'medicine' => $medicine->name,
            '_R' => intval(round($_R)),
            'price' => intval(round($price)),
            'orderCost' => intval(round($orderCost)),
            'storageCost' => intval(round($storageCost)),
            '_EOQ' => intval(round($_EOQ)),
            'orderFrequency' => intval(round($orderFrequency)),
            '_O' => intval(round($_O)),
            '_C' => intval(round($_C)),
            'stockTotalCost' => intval(round($stockTotalCost)),
            '_LT' => intval(round($_LT)),
            '_SS' => intval(round($_SS)),
            '_ROP' => intval(round($_ROP)),
          ]);
        }
      }
      // dd($eoqs);
      return view('dashboard.calculation.eoq', compact('eoqs'));
    } catch (\Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menghitung data!', $th->getMessage()]]);
    }
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
      $sales = collect([]);
      foreach ($medicine->stocks as $stock) {
        foreach ($stock->sales as $sale) {
          $sales[] = $sale;
        }
      }
      $sortedSales = $sales->sortBy('date')->values();
      $wma2Periode = calculateWMA($medicine->stocks, 2);
      $wma3Periode = calculateWMA($medicine->stocks, 3);
      $wma4Periode = calculateWMA($medicine->stocks, 4);
      $_MAPES = [
        (object) [
          'periode' => $wma2Periode->wmaPeriodeResult->periode,
          'MAPE' => $wma2Periode->wmaPeriodeResult->MAPE
        ], 
        (object) [
          'periode' => $wma3Periode->wmaPeriodeResult->periode,
          'MAPE' => $wma3Periode->wmaPeriodeResult->MAPE
        ], 
        (object) [
          'periode' => $wma4Periode->wmaPeriodeResult->periode,
          'MAPE' => $wma4Periode->wmaPeriodeResult->MAPE
        ]
      ];
      $result = array_reduce($_MAPES, function ($carry, $item) {
        if ($carry === null || $item->MAPE < $carry->MAPE) {
            return $item;
        }
          return $carry;
      });
      
      $minMAPE = $result->MAPE;
      $periodeTerendah = $result->periode;

      $recomendation = 'Peramalan Periode '.$periodeTerendah.' dengan MAPE '.$minMAPE.'%';
      $labels = [];
      $datasets = [];
      for ($i=0; $i < count($sales); $i++) { 
        $date = date('F Y', strtotime($sales[$i]->date));
        $labels[$i] = $date;
      }
      array_push($labels, "BULAN DEPAN");
      $data2Periode = [];
      foreach ($wma2Periode->wmaPeriodeCalc as $data) {
        $data2Periode[] = $data->ft;
      }
      array_push($data2Periode, $wma2Periode->wmaPeriodeResult->nextFt);
      $datasets[0] = (object) [
        'label' => '2 Periode',
        'data' => $data2Periode,
        'fill' => false,
        'borderColor' => 'rgb(255, 0, 0)',
        'tension' => 0.1
      ];
      $data3Periode = [];
      foreach ($wma3Periode->wmaPeriodeCalc as $data) {
        $data3Periode[] = $data->ft;
      }
      array_push($data3Periode, $wma3Periode->wmaPeriodeResult->nextFt);
      $datasets[1] = (object) [
        'label' => '3 Periode',
        'data' => $data3Periode,
        'fill' => false,
        'borderColor' => 'rgb(0, 255, 0)',
        'tension' => 0.1
      ];
      $data4Periode = [];
      foreach ($wma4Periode->wmaPeriodeCalc as $data) {
        $data4Periode[] = $data->ft;
      }
      array_push($data4Periode, $wma4Periode->wmaPeriodeResult->nextFt);
      $datasets[2] = (object) [
        'label' => '4 Periode',
        'data' => $data4Periode,
        'fill' => false,
        'borderColor' => 'rgb(0, 0, 255)',
        'tension' => 0.1
      ];
      // dd($labels);
      return view('dashboard.calculation.wma-result', compact('wma2Periode', 'wma3Periode', 'wma4Periode', 'medicine', 'labels', 'datasets', 'recomendation'));
    } catch (\Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menghitung data!', $th->getMessage()]]);
    }
  }
}
