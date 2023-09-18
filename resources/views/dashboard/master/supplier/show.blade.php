@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Supplier' => route('master.supplier.index'),
        'Detail' => '',
    ],
])

@section('title', "Supplier - {$supplier->name}")

@section('main')
  <x-card title="Detail {{ $supplier->name }}">
    <x-slot:card-header>
      <x-button.back :route="route('master.supplier.index')" class="note-btn" />
      <x-button.edit :route="route('master.supplier.edit', $supplier->uuid)" class="note-btn" />
      <x-button.delete :id="$supplier->uuid" :route="route('master.supplier.destroy', $supplier->uuid)" class="note-btn"
        confirm="Data {{ $supplier->name }} akan dihapus, apakah Anda ingin melanjutkan?" />
    </x-slot:card-header>

    <x-grid.row class="justify-content-center">
      <x-grid.col width="6" sm="4" md="3" lg="2">
        <div class="d-flex flex-column">
          <div class="bg-primary text-white p-2 rounded-top text-center">Alamat</div>
          <div class="border border-primary py-2 rounded-bottom text-center">{{ $supplier->address }}</div>
        </div>
      </x-grid.col>
      <x-grid.col width="6" sm="4" md="3" lg="2">
        <div class="d-flex flex-column">
          <div class="bg-primary text-white p-2 rounded-top text-center">Nomor HP</div>
          <div class="border border-primary py-2 rounded-bottom text-center">{{ $supplier->phone_number }}</div>
        </div>
      </x-grid.col>
    </x-grid.row>
  </x-card>

  <x-card.table id="supplier" title="Data Stok Obat dari {{ $supplier->name }}" :columns="['Nama Obat', 'Tanggal Masuk', 'Jumlah']" no-actions-field>
    @foreach ($supplier->stocks as $stock)
      <x-table.row :$loop>
        <td>{{ $stock->medicine->name }}</td>
        <!-- TODO: use dynamic date from database -->
        <td>31/12/23</td>
        <td>{{ $stock->quantity }}</td>
      </x-table.row>
    @endforeach
  </x-card.table>
@endsection
