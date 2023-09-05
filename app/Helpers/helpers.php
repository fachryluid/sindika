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
    for ($i = 0; $i < $sales->count() + 1; $i++) {
      if ($i === $sales->count()) {
        $wmaPeriode->wmaPeriodeResult->nextFt = number_format((function ($periode, $sales, $i) {
          $k = 1;
          $n = 0;
          $temp = 0;
          for ($j = $periode; $j > 0; $j--) {
            $n += $k;
            $temp += $sales[$i - $j]->quantity_sold * $k++;
          }
          return $temp / $n;
        })($periode, $sales, $i), 2);
        break;
      }
      if ($i >= $periode) {
        $ft = number_format((function ($periode, $sales, $i) {
          $k = 1;
          $n = 0;
          $temp = 0;
          for ($j = $periode; $j > 0; $j--) {
            $n += $k;
            $temp += $sales[$i - $j]->quantity_sold * $k++;
          }
          return $temp / $n;
        })($periode, $sales, $i), 2);
        $error = number_format($sales[$i]->quantity_sold - $ft, 2);
        $absError = number_format(abs($error), 2);
        $squareError = number_format($error * $error, 2);
        $percentError = number_format(abs($error) / $sales[$i]->quantity_sold * 100, 2);
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
      $totalError += number_format($absError, 2);
      $totalSquareError += number_format($squareError, 2);
      $totalPercentError += number_format($percentError, 2);
      $wmaPeriode->wmaPeriodeResult->totalError = number_format($totalError, 2);
      $wmaPeriode->wmaPeriodeResult->totalSquareError = number_format($totalSquareError, 2);
      $wmaPeriode->wmaPeriodeResult->totalPercentError = number_format($totalPercentError, 2);
      $wmaPeriode->wmaPeriodeResult->MAD = number_format($totalError / ($sales->count() - $periode), 2);
      $wmaPeriode->wmaPeriodeResult->MSE = number_format($totalSquareError / ($sales->count() - $periode), 2);
      $wmaPeriode->wmaPeriodeResult->MAPE = number_format($totalPercentError / ($sales->count() - $periode), 2);
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