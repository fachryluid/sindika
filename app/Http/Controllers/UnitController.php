<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Unit;

class UnitController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // dummy data, use actual `Unit` model instead
    $units = collect([
      (object) [
        "id" => 1,
        "name" => "Strip"
      ],
      (object) [
        "id" => 2,
        "name" => "Box"
      ],
      (object) [
        "id" => 3,
        "name" => "Botol"
      ],
    ]);

    return view('dashboard.master.unit.index', compact('units'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUnitRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Unit $unit)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Unit $unit)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUnitRequest $request, Unit $unit)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Unit $unit)
  {
    //
  }
}
