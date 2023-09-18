<?php

use Illuminate\Support\Facades\Hash;

if (!function_exists('confirmPassword')) {
  function confirmPassword($inputPassword)
  {
    $password = auth()->user()->password;
    if (Hash::check($inputPassword, $password)) {
      return true;
    }
    return false;
  }
}

if (!function_exists('calculateWMA')) {
  function calculateWMA($medicineStocks, $periode): object
  {
    $sales = collect([]);
    foreach ($medicineStocks as $stock) {
      foreach ($stock->sales as $sale) {
        $sales[] = $sale;
      }
    }
    $sortedSales = $sales->sortBy('date')->values();
    $ft = null;
    $error = null;
    $absError = null;
    $squareError = null;
    $percentError = null;
    $wmaPeriode = (object) [
      'wmaPeriodeCalc' => [],
      'wmaPeriodeResult' => (object) [
        'periode' => $periode,
        'nextFt' => null,
        'totalError' => null,
        'totalSquareError' => null,
        'totalPercentError' => null,
        'MAD' => null,
        'MSE' => null,
        'MAPE' => null
      ]
    ];
    $totalError = 0;
    $totalSquareError = 0;
    $totalPercentError = 0;
    for ($i = 0; $i < $sortedSales->count() + 1; $i++) {
      if ($i === $sortedSales->count()) {
        $wmaPeriode->wmaPeriodeResult->nextFt = number_format((function ($periode, $sortedSales, $i) {
          $k = 1;
          $n = 0;
          $temp = 0;
          for ($j = $periode; $j > 0; $j--) {
            $n += $k;
            $temp += $sortedSales[$i - $j]->quantity_sold * $k++;
          }
          return $temp / $n;
        })($periode, $sortedSales, $i), 2);
        break;
      }
      if ($i >= $periode) {
        $ft = number_format((function ($periode, $sortedSales, $i) {
          $k = 1;
          $n = 0;
          $temp = 0;
          for ($j = $periode; $j > 0; $j--) {
            $n += $k;
            $temp += $sortedSales[$i - $j]->quantity_sold * $k++;
          }
          return $temp / $n;
        })($periode, $sortedSales, $i), 2);
        $error = (float) number_format($sortedSales[$i]->quantity_sold - $ft, 2);
        $absError = (float) number_format(abs($error), 2);
        $squareError = (float) number_format($error * $error, 2);
        $percentError = (float) number_format(abs($error) / $sortedSales[$i]->quantity_sold * 100, 2);
      }
      $wmaPeriode->wmaPeriodeCalc[$i] = (object) [
        'date' => strtoupper(date('F/Y', strtotime($sortedSales[$i]->date))),
        'quantitySold' => $sortedSales[$i]->quantity_sold,
        'ft' => $ft,
        'error' => $error,
        'absError' => $absError,
        'squareError' => $squareError,
        'percentError' => $percentError
      ];
      $totalError += number_format($absError, 2);
      $totalSquareError += number_format($squareError, 2);
      $totalPercentError += number_format($percentError, 2);
      $wmaPeriode->wmaPeriodeResult->totalError = number_format($totalError, 2);
      $wmaPeriode->wmaPeriodeResult->totalSquareError = number_format($totalSquareError, 2);
      $wmaPeriode->wmaPeriodeResult->totalPercentError = number_format($totalPercentError, 2);
      $wmaPeriode->wmaPeriodeResult->MAD = number_format($totalError / ($sortedSales->count() - $periode), 2);
      $wmaPeriode->wmaPeriodeResult->MSE = number_format($totalSquareError / ($sortedSales->count() - $periode), 2);
      $wmaPeriode->wmaPeriodeResult->MAPE = number_format($totalPercentError / ($sortedSales->count() - $periode), 2);
    }
    return $wmaPeriode;
  }
}

if (!function_exists('formatPhoneNumber')) {
  function formatPhoneNumber($phoneNumber)
  {
    $cleanedNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
    if (strlen($cleanedNumber) === 11) {
      $formattedNumber = substr($cleanedNumber, 0, 3) . '-' . substr($cleanedNumber, 3, 4) . '-' . substr($cleanedNumber, 7);
      return $formattedNumber;
    } else {
      return $phoneNumber;
    }
  }
}

if (!function_exists('calculateEOQ')) {
  function calculateEOQ($medicines): object
  {
    $eoqs = collect([]);
    foreach ($medicines as $medicine) {
      $sales = collect([]);
      foreach ($medicine->stocks as $stock) {
        foreach ($stock->sales as $sale) {
          $sales[] = $sale;
        }
      }
      $sortedSales = $sales->sortBy('date')->values();

      if (count($sortedSales) >= 12) {
        $lastYearSales = array_slice($sortedSales->toArray(), -12);

        $_R = 0; // C4
        foreach ($lastYearSales as $item) {
          $_R += $item['quantity_sold'];
        }

        $prices = collect($medicine->stocks)->pluck('price');
        $price = $prices->max();

        $orderCosts = collect($medicine->stocks)->pluck('order_cost');
        $orderCost = $orderCosts->max();

        $storageCost = $_R * ($price * 0.1);

        $_EOQ = sqrt((2 * $_R * $orderCost) / $storageCost);

        $orderFrequency = $_R / $_EOQ;

        $_O = $orderCost * $orderFrequency;

        $_C = ($_EOQ / 2) * $storageCost;

        $stockTotalCost = $_O + $_C;

        $orderDate = new DateTime($medicine->stocks[0]->order_date);
        $expectedDelivery = new DateTime($medicine->stocks[0]->expected_delivery);
        $_LT = $expectedDelivery->diff($orderDate)->days;

        $_SS = ($_R / 360) * $_LT;

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
          '_SS' => intval(round($_SS)),
          '_ROP' => intval(round($_ROP)),
          '_LT' => intval(round($_LT)),
        ]);
      }
    }
    return $eoqs;
  }
}