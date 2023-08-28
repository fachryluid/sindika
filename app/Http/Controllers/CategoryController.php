<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // dummy data, use actual `Category` model instead
    $categories = collect([
      (object) [
        "id" => 1,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72ca",
        "name" => "Obat Narkotika"
      ],
      (object) [
        "id" => 2,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
        "name" => "Obat Bebas"
      ],
      (object) [
        "id" => 3,
        "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cc",
        "name" => "Obat Keras"
      ],
    ]);

    return view('dashboard.master.category.index', compact('categories'));
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
  public function store(StoreCategoryRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Category $category)
  {
    // no need to do this if `Type` and `Medicine` models are already created and related
    // because `$type` already a `Type` model instance
    $category = (object) [
      "id" => 1,
      "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
      "name" => "Narkotika",
      "medicines" => [
        (object) [
          "id" => 1,
          "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
          "name" => "Paracetamol",
        ],
        (object) [
          "id" => 2,
          "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
          "name" => "Amoxicillin",
        ],
        (object) [
          "id" => 3,
          "uuid" => "128c4c7f-2199-4e20-819b-8074cbfc72cb",
          "name" => "Ciprofloxacin",
        ],
      ]
    ];

    return view('dashboard.master.category.show', compact('category'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCategoryRequest $request, Category $category)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    //
  }
}
