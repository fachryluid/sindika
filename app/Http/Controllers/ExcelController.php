<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
  public function format(Request $request)
  {
    dd($request->start_date, $request->finish_date);
  }
}
