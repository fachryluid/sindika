<?php

use Illuminate\Support\Facades\Hash;

if (!function_exists('confirmPassword')) {
  function confirmPassword($inputPassword)
  {
    config('app.env') === 'local' ? $password = Hash::make(config('app.admin_password')) : $password = session('user')->password;
    if (Hash::check($inputPassword, $password)) {
      return true;
    }
    return false;
  }
}

if (!function_exists('calculateWMA')) {
  function calculateWMA($sales, $periode): object
  {
    $ft = null;
    $error = null;
    $absError = null;
    $squareError = null;
    $percentError = null;
    $wmaPeriode = (object) [
      'wmaPeriodeCalc' => [],
      'wmaPeriodeResult' => (object) [
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
    for ($i = 0; $i < $sales->count() + 1; $i++) {
      if ($i === $sales->count()) {
        $wmaPeriode->wmaPeriodeResult->nextFt = round((function ($periode, $sales, $i) {
          $k = 1;
          $n = 0;
          $temp = 0;
          for ($j = $periode; $j > 0; $j--) {
            $n += $k;
            $temp += $sales[$i - $j]->quantity_sold * $k++;
          }
          return $temp / $n;
        })($periode, $sales, $i));
        break;
      }
      if ($i >= $periode) {
        $ft = round((function ($periode, $sales, $i) {
          $k = 1;
          $n = 0;
          $temp = 0;
          for ($j = $periode; $j > 0; $j--) {
            $n += $k;
            $temp += $sales[$i - $j]->quantity_sold * $k++;
          }
          return $temp / $n;
        })($periode, $sales, $i));
        $error = round($sales[$i]->quantity_sold - $ft);
        $absError = round(abs($error));
        $squareError = round($error * $error);
        $percentError = round(abs($error) / $sales[$i]->quantity_sold * 100);
      }
      $wmaPeriode->wmaPeriodeCalc[$i] = (object) [
        'date' => strtoupper(date('F/Y', strtotime($sales[$i]->date))),
        'quantitySold' => $sales[$i]->quantity_sold,
        'ft' => $ft,
        'error' => $error,
        'absError' => $absError,
        'squareError' => $squareError,
        'percentError' => $percentError
      ];
      $totalError += round($absError);
      $totalSquareError += round($squareError);
      $totalPercentError += round($percentError);
      $wmaPeriode->wmaPeriodeResult->totalError = round($totalError);
      $wmaPeriode->wmaPeriodeResult->totalSquareError = round($totalSquareError);
      $wmaPeriode->wmaPeriodeResult->totalPercentError = round($totalPercentError);
      $wmaPeriode->wmaPeriodeResult->MAD = round($totalError / ($sales->count() - $periode));
      $wmaPeriode->wmaPeriodeResult->MSE = round($totalSquareError / ($sales->count() - $periode));
      $wmaPeriode->wmaPeriodeResult->MAPE = round($totalPercentError / ($sales->count() - $periode));
    }
    return $wmaPeriode;
  }
}
