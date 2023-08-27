<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;

class TypeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // dummy data, use actual `Type` model instead
    $types = collect([
      (object) [
        "id" => 1,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72ca",
        "name" => "Analgesik"
      ],
      (object) [
        "id" => 2,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
        "name" => "Abses"
      ],
      (object) [
        "id" => 3,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cc",
        "name" => "Abdomen/Perut"
      ],
    ]);

    return view('dashboard.master.type.index', compact('types'));
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
  public function store(StoreTypeRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Type $type)
  {
    // no need to do this if `Type` and `Medicine` models are already created and related
    // because `$type` already a `Type` model instance
    $type = (object)[
      "id" => 1,
      "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
      "name" => "Analgesik",
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
          "name" => "Amoxilin",
        ],
      ]
    ];

    return view('dashboard.master.type.show', compact('type'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Type $type)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateTypeRequest $request, Type $type)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Type $type)
  {
    //
  }
}
