<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Throwable;

class TypeController extends Controller
{
  public function index()
  {
    $types = Type::all();
    return view('dashboard.master.type.index', compact('types'));
  }

  public function store(StoreTypeRequest $request)
  {
    try {
      Type::create($request->all());
      return redirect()->route('master.type.index')->with('success', 'Data berhasil disimpan!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menyimpan data!', $th->getMessage()]]);
    }
  }

  public function show(Type $type)
  {
    try {
      $type = Type::where('uuid', $type->uuid)->with('medicines')->firstOrFail();
      return view('dashboard.master.type.show', compact('type'));
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengambil data!', $th->getMessage()]]);
    }
  }

  public function update(UpdateTypeRequest $request, Type $type)
  {
    try {
      Type::where('id', $type->id)->update($request->all());
      return redirect()->route('master.type.index')->with('success', 'Data berhasil diedit!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat mengedit data!', $th->getMessage()]]);
    }
  }

  public function destroy(Type $type, Request $request)
  {
    try {
      throw_if(!confirmPassword($request->password), 'Password yang anda masukkan salah!');
      Type::destroy($type->id);
      return redirect()->route('master.type.index')->with('success', 'Data Jenis ' . $type->name . ' berhasil dihapus!');
    } catch (Throwable $th) {
      return redirect()->back()
        ->withErrors(['message' => ['Terjadi kesalahan saat menghapus data!', $th->getMessage()]]);
    }
  }
}
