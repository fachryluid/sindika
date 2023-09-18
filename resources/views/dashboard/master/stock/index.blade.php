@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Stok' => '',
    ],
])

@section('title', 'Stok')

@section('main')
  <x-card.table id="stock" :columns="['Nama Supplier', 'Nama Obat', 'Jumlah']" create-button-type="link" :create-route="route('master.stock.create')" modal-title="Tambah Stok Obat">
    @foreach ($stocks as $stock)
      <x-table.row :$loop :id="$stock->uuid" :detail-route="route('master.stock.show', $stock->uuid)" :edit-route="route('master.stock.edit', $stock->uuid)" :delete-route="route('master.stock.destroy', $stock->uuid)"
        delete-confirm="Data stok ini akan dihapus, apakah Anda ingin melanjutkan?">
        <td>{{ $stock->supplier->name }}</td>
        <td>{{ $stock->medicine->name }}</td>
        <td>{{ $stock->quantity }}</td>
      </x-table.row>
    @endforeach
  </x-card.table>
@endsection
