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
        "name" => "Analgesik"
      ],
      (object) [
        "id" => 2,
        "name" => "Abses"
      ],
      (object) [
        "id" => 3,
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
    //
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
