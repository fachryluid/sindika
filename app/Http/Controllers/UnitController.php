<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Http\Request;
use Throwable;

class UnitController extends Controller
{
  public function index()
  {
    $units = Unit::all();
    return view('dashboard.master.unit.index', compact('units'));
  }

  public function store(StoreUnitRequest $request)
  {
    try {
      Unit::create($request->all());
      return redirect()->route('master.unit.index')->with('success', 'Data berhasil disimpan!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menyimpan data!', $th->getMessage()]]);
    }
  }
  public function show(Unit $unit)
  {
    try {
      $unit = Unit::where('uuid', $unit->uuid)->with('medicines')->firstOrFail();
      return view('dashboard.master.unit.show', compact('unit'));
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengambil data!', $th->getMessage()]]);
    }
  }

  public function update(UpdateUnitRequest $request, Unit $unit)
  {
    try {
      Unit::where('id', $unit->id)->update($request->all());
      return redirect()->route('master.unit.index')->with('success', 'Data berhasil diedit!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengedit data!', $th->getMessage()]]);
    }
  }

  public function destroy(Unit $unit, Request $request)
  {
    try {
      throw_if(!confirmPassword($request->password), 'Password yang anda masukkan salah!');
      Unit::destroy($unit->id);
      return redirect()->route('master.unit.index')->with('success', 'Data Satuan ' . $unit->name . ' berhasil dihapus!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menghapus data!', $th->getMessage()]]);
    }
  }
}
