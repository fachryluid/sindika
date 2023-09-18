@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Supplier' => '',
    ],
])

@section('title', 'Supplier')

@section('main')
  <x-card.table id="supplier" :columns="['Nama Supplier', 'Alamat', 'No. Hp']" create-button-type="link" :create-route="route('master.supplier.create')">
    @foreach ($suppliers as $supplier)
      <x-table.row :$loop :id="$supplier->uuid"
        delete-confirm="Data supplier {{ $supplier->name }} akan dihapus, apakah Anda ingin melanjutkan?"
        :detail-route="route('master.supplier.show', $supplier->uuid)" :delete-route="route('master.supplier.destroy', $supplier->uuid)" :edit-route="route('master.supplier.edit', $supplier->uuid)">
        <td>{{ $supplier->name }}</td>
        <td>{{ $supplier->address }}</td>
        <td>+62{{ $supplier->phone_number }}</td>
      </x-table.row>
    @endforeach
  </x-card.table>
@endsection
