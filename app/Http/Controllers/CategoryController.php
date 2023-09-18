<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Throwable;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    return view('dashboard.master.category.index', compact('categories'));
  }

  public function store(StoreCategoryRequest $request)
  {
    try {
      Category::create($request->all());
      return redirect()->route('master.category.index')->with('success', 'Data berhasil disimpan!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menyimpan data!', $th->getMessage()]]);
    }
  }

  public function show(Category $category)
  {
    try {
      $category = Category::where('uuid', $category->uuid)->with('medicines')->firstOrFail();
      return view('dashboard.master.category.show', compact('category'));
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengambil data!', $th->getMessage()]]);
    }
  }

  public function update(UpdateCategoryRequest $request, Category $category)
  {
    try {
      $category->update($request->all());
      return redirect()->route('master.category.index')->with('success', 'Data berhasil diedit!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengedit data!', $th->getMessage()]]);
    }
  }

  public function destroy(Category $category, Request $request)
  {
    try {
      throw_if(!confirmPassword($request->password), 'Password yang anda masukkan salah!');
      Category::destroy($category->id);
      return redirect()->route('master.category.index')->with('success', 'Data Kategori ' . $category->name . ' berhasil dihapus!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menghapus data!', $th->getMessage()]]);
    }
  }
}
