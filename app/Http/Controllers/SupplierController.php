<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // dummy data, use actual `Supplier` model instead
    $suppliers = collect([
      (object) [
        "id" => 1,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72ca",
        "name" => "One Setia",
        "address" => "Jl. Trans Sulawesi, Gtlo",
        "phone" => "0812-3456-7890"
      ],
      (object) [
        "id" => 2,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
        "name" => "Kimia Farma Jds",
        "address" => "Jl. Trans Sulawesi, Gtlo",
        "phone" => "0812-3456-7890"
      ],
      (object) [
        "id" => 3,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cc",
        "name" => "Cahaya Sejati",
        "address" => "Jl. Trans Sulawesi, Gtlo",
        "phone" => "0812-3456-7890"
      ],
    ]);

    return view('dashboard.master.supplier.index', compact('suppliers'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.master.supplier.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreSupplierRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Supplier $supplier)
  {
    // no need to do this if `Supplier` and `Medicine` models are already created and related
    // because `$supplier` already a `Supplier` model instance
    $supplier = (object)[
      "id" => 1,
      "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
      "name" => "One Setia",
      "medicines" => [
        (object)[
          "id" => 1,
          "name" => "Paracetamol",
        ],
        (object)[
          "id" => 2,
          "name" => "Amoxilin",
        ],
        (object)[
          "id" => 3,
          "name" => "Ciprofloxacin",
        ],
      ]
    ];

    return view('dashboard.master.supplier.show', compact('supplier'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Supplier $supplier)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateSupplierRequest $request, Supplier $supplier)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Supplier $supplier)
  {
    //
  }
}
