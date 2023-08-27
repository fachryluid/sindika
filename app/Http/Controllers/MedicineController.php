<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Models\Medicine;

class MedicineController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // dummy data, use actual `Medicine` model instead
    $medicines = collect([
      (object) [
        "id" => 1,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72ca",
        "name" => "Amoxcilin",
        "expire_date" => "12/07/24"
      ],
      (object) [
        "id" => 2,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
        "name" => "Dexitab",
        "expire_date" => "20/10/24"
      ],
      (object) [
        "id" => 3,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cc",
        "name" => "Mixagrip",
        "expire_date" => "12/05/25"
      ],
    ]);

    return view('dashboard.master.medicine.index', compact('medicines'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.master.medicine.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreMedicineRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Medicine $medicine)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Medicine $medicine)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateMedicineRequest $request, Medicine $medicine)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Medicine $medicine)
  {
    //
  }
}
