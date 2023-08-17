@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Satuan' => route('master.unit.index'),
        'Detail' => '',
    ],
])

@section('title', "Satuan - {$unit->name}")

@section('main')
  <x-card.table id="unit" title="Data Satuan Obat {{ $unit->name }}" :columns="['Nama Obat']" no-actions-field>
    @foreach ($unit->medicines as $medicine)
      <x-table.row :$loop>
        <td>{{ $medicine->name }}</td>
      </x-table.row>
    @endforeach

    <x-slot:card-footer>
      <div class="text-right">
        <x-button.index type="link" route="{{ route('master.unit.index') }}" color="secondary" class="mr-2">
          <i class="fas fa-arrow-left"></i>
          Kembali
        </x-button.index>

        <x-button.delete route="{{ route('master.unit.destroy', $unit->uuid) }}" text="Hapus Data Satuan Ini" />
      </div>
    </x-slot:card-footer>
  </x-card.table>
@endsection
