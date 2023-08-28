@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Stok' => route('master.stock.index'),
        'Tambah' => '',
    ],
])

@section('title', 'Data Obat')

@section('main')
  <x-card.form :action="route('master.stock.store')" title="Tambah data stok">
    <x-form.input type="select" name="supplier_id" label="Nama Supplier" placeholder="Pilih supplier">
      @foreach ($suppliers as $supplier)
        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
      @endforeach
    </x-form.input>

    <x-form.input type="select" name="medicine_id" label="Nama Obat" placeholder="Pilih obat">
      @foreach ($medicines as $medicine)
        <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
      @endforeach
    </x-form.input>

    <x-form.input type="number" name="quantity" label="Jumlah" min="1" placeholder="Masukkan jumlah" />
    <x-form.input type="text" name="order_cost" label="Biaya Pesan" placeholder="Masukkan biaya pemesanan" />
    <x-form.input type="text" name="storage_cost" label="Biaya Simpan" placeholder="Masukkan biaya penyimpanan" />
    <x-form.input type="date" name="order_date" label="Tanggal Pemesanan" optional />
    <x-form.input type="date" name="expected_delivery" label="Expected Delivery" />
    <x-form.input type="text" name="price" label="Harga" placeholder="Masukkan harga" />
  </x-card.form>
@endsection
