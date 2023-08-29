@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Medicine' => route('master.medicine.index'),
        'Detail' => '',
    ],
])

@section('title', "Detail Obat {$medicine->name}")

@section('main')
  <x-card :title="$medicine->name">
    <x-slot:card-header>
      <x-button.back :route="route('master.medicine.index')" class="note-btn">
        Kembali
      </x-button.back>

      <x-button.edit :route="route('master.medicine.edit', $medicine->uuid)" class="note-btn">
        Edit
      </x-button.edit>

      <x-button.delete :id="$medicine->uuid" :route="route('master.medicine.destroy', $medicine->uuid)" class="note-btn"
        confirm="Data {{ $medicine->name }} akan dihapus, apakah Anda ingin melanjutkan?">
        Hapus
      </x-button.delete>
    </x-slot:card-header>

    <x-grid.row class="justify-content-center">
      <x-grid.col md="3" class="mt-3 d-flex flex-column" style="justify-content: space-evenly;">
        <div class="d-flex">
          <div style="flex: 1;"
            class="bg-primary text-white py-2 px-2 rounded-left d-flex align-items-center justify-content-end">
            Satuan
          </div>
          <div style="flex: 1;" class="border border-primary py-2 px-2 rounded-right">{{ $medicine->unit->name }}</div>
        </div>
        <div class="d-flex">
          <div style="flex: 1;"
            class="bg-primary text-white py-2 px-2 rounded-left d-flex align-items-center justify-content-end">Jenis
          </div>
          <div style="flex: 1;" class="border border-primary py-2 px-2 rounded-right">{{ $medicine->type->name }}</div>
        </div>
        <div class="d-flex">
          <div style="flex: 1;"
            class="bg-primary text-white py-2 px-2 rounded-left d-flex align-items-center justify-content-end">Kategori
          </div>
          <div style="flex: 1;" class="border border-primary py-2 px-2 rounded-right">{{ $medicine->category->name }}
          </div>
        </div>
      </x-grid.col>

      <x-grid.col md="3" class="mt-3">
        <img class="img-fluid" src="{{ $medicine->image }}" alt="{{ $medicine->name }}">
      </x-grid.col>
    </x-grid.row>
  </x-card>
@endsection
