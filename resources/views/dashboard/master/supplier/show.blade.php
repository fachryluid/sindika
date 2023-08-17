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
  <x-card.table id="supplier" title="Data Supplier Obat {{ $supplier->name }}" :columns="['Nama Obat Yang Masuk']" no-actions-field>
    @foreach ($supplier->medicines as $medicine)
      <x-table.row :$loop>
        <td>{{ $medicine->name }}</td>
      </x-table.row>
    @endforeach

    <x-slot:card-footer>
      <div class="text-right">
        <x-button.index type="link" route="{{ route('master.supplier.index') }}" color="secondary" class="mr-2">
          <i class="fas fa-arrow-left"></i>
          Kembali
        </x-button.index>

        <x-button.delete route="{{ route('master.supplier.destroy', $supplier->uuid) }}" text="Hapus Data Supplier Ini" />
      </div>
    </x-slot:card-footer>
  </x-card.table>
@endsection
