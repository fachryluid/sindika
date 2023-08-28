<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Throwable;

class MedicineController extends Controller
{
  public function index()
  {
    $medicines = Medicine::all();
    return view('dashboard.master.medicine.index', compact('medicines'));
  }

  public function create()
  {
    return view('dashboard.master.medicine.create');
  }

  public function store(StoreMedicineRequest $request)
  {
    try {
      Medicine::create($request->all());
      return redirect()->route('master.medicine.index')->with('success', 'Data berhasil disimpan!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menyimpan data!', $th->getMessage()]]);
    }
  }

  public function show(Medicine $medicine)
  {
    try {
      $medicine = Medicine::where('uuid', $medicine->uuid)->firstOrFail();
      return view('dashboard.master.medicine.show', compact('medicine'));
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengambil data!', $th->getMessage()]]);
    }
  }

  public function edit(Medicine $medicine)
  {
    try {
      $medicine = Medicine::where('uuid', $medicine->uuid)->firstOrFail();
      return view('dashboard.master.medicine.edit', compact('medicine'));
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengambil data!', $th->getMessage()]]);
    }
  }

  public function update(UpdateMedicineRequest $request, Medicine $medicine)
  {
    try {
      Medicine::where('id', $medicine->id)->update($request->all());
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
