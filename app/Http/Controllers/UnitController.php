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
    $units = Unit::all();

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
    try {
      Unit::create($request->all());
      return redirect()->route('master.unit.index')->with('success', 'Data berhasil disimpan!');
    } catch (\Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menyimpan data!', $th->getMessage()]]);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Unit $unit)
  {
    // no need to do this if `Unit` and `Medicine` models are already created and related
    // because `$unit` already a `Unit` model instance
    $unit = (object)[
      'id' => 1,
      'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cb',
      'name' => 'Strip',
      'medicines' => [
        (object)[
          'id' => 1,
          'name' => 'Paracetamol',
        ],
        (object)[
          'id' => 2,
          'name' => 'Amoxilin',
        ],
        (object)[
          'id' => 3,
          'name' => 'Dexamethasone',
        ],
      ]
    ];

    return view('dashboard.master.unit.show', compact('unit'));
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
