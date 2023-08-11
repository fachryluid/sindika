<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
  public function eoq()
  {
    // dummy data, use actual `Medicine` model instead
    $medicines = collect([
      (object) [
        "id" => 1,
        "name" =>
        "Amoxcilin",
        "stock" => 83,
        "expire_date" => "12/07/24"
      ],
      (object) [
        "id" => 2,
        "name" => "Dexitab",
        "stock" => 15,
        "expire_date" => "20/10/24"
      ],
      (object) [
        "id" => 3,
        "name" => "Mixagrip",
        "stock" => 83,
        "expire_date" => "12/05/25"
      ],
    ]);

    return view('dashboard.calculation.eoq', compact('medicines'));
  }
}
