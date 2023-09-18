<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Throwable;

class SupplierController extends Controller
{
  public function index()
  {
    $suppliers = Supplier::all();
    return view('dashboard.master.supplier.index', compact('suppliers'));
  }

  public function create()
  {
    return view('dashboard.master.supplier.create');
  }

  public function store(StoreSupplierRequest $request)
  {
    try {
      Supplier::create($request->all());
      return redirect()->route('master.supplier.index')->with('success', 'Data berhasil disimpan!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menyimpan data!', $th->getMessage()]]);
    }
  }

  public function show(Supplier $supplier)
  {
    try {
      return view('dashboard.master.supplier.show', compact('supplier'));
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengambil data!', $th->getMessage()]]);
    }
  }

  public function edit(Supplier $supplier)
  {
    return view('dashboard.master.supplier.edit', compact('supplier'));
  }

  public function update(UpdateSupplierRequest $request, Supplier $supplier)
  {
    try {
      $supplier->update($request->all());
      return redirect()->route('master.supplier.index')->with('success', 'Data berhasil diedit!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengedit data!', $th->getMessage()]]);
    }
  }

  public function destroy(Supplier $supplier, Request $request)
  {
    try {
      throw_if(!confirmPassword($request->password), 'Password yang anda masukkan salah!');
      Supplier::destroy($supplier->id);
      return redirect()->route('master.supplier.index')->with('success', 'Data Supplier ' . $supplier->name . ' berhasil dihapus!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menghapus data!', $th->getMessage()]]);
    }
  }
}
