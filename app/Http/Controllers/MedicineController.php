<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Type;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class MedicineController extends Controller
{
  public function index()
  {
    $medicines = Medicine::with(['unit', 'type', 'category'])->get();
    return view('dashboard.master.medicine.index', compact('medicines'));
  }

  public function create()
  {
    $units = Unit::all();
    $types = Type::all();
    $categories = Category::all();
    return view('dashboard.master.medicine.create', compact('units', 'types', 'categories'));
  }

  public function store(StoreMedicineRequest $request)
  {
    try {
      $image = null;
      if (isset($request->image)) {
        $filePath = Storage::put('public/uploads/medicine', $request->file('image'));
        $image = pathinfo($filePath, PATHINFO_BASENAME);
      }
      Medicine::create([
        'image' => $image
      ] + $request->all());
      return redirect()->route('master.medicine.index')->with('success', 'Data berhasil disimpan!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menyimpan data!', $th->getMessage()]]);
    }
  }

  public function show(Medicine $medicine)
  {
    try {
      $medicine = Medicine::where('uuid', $medicine->uuid)->with('unit', 'type', 'category')->firstOrFail();
      return view('dashboard.master.medicine.show', compact('medicine'));
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengambil data!', $th->getMessage()]]);
    }
  }

  public function edit(Medicine $medicine)
  {
    try {
      $units = Unit::all();
      $types = Type::all();
      $categories = Category::all();
      return view('dashboard.master.medicine.edit', compact('medicine', 'units', 'types', 'categories'));
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengambil data!', $th->getMessage()]]);
    }
  }

  public function update(UpdateMedicineRequest $request, Medicine $medicine)
  {
    try {
      $fileName = $medicine->image;
      if ($request->file('image')) {
        $filePath = Storage::put('public/uploads/medicine', $request->file('image'));
        $fileName = pathinfo($filePath, PATHINFO_BASENAME);
      }
      $medicine->update([
        'image' => $fileName
      ] + $request->all());
      return redirect()->route('master.medicine.index')->with('success', 'Data berhasil diedit!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengedit data!', $th->getMessage()]]);
    }
  }

  public function destroy(Medicine $medicine, Request $request)
  {
    try {
      throw_if(!confirmPassword($request->password), 'Password yang anda masukkan salah!');
      Medicine::destroy($medicine->id);
      return redirect()->route('master.medicine.index')->with('success', 'Data Obat ' . $medicine->name . ' berhasil dihapus!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menghapus data!', $th->getMessage()]]);
    }
  }
}
