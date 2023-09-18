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
    <x-slot:card-header>
      <x-button.back :route="route('master.unit.index')" class="note-btn" />
      <x-button.delete :id="$unit->uuid" :route="route('master.unit.destroy', $unit->uuid)" class="note-btn"
        confirm="Data terkait satuan {{ $unit->name }} akan dihapus, apakah Anda ingin melanjutkan?" />
    </x-slot:card-header>

    @foreach ($unit->medicines as $medicine)
      <x-table.row :$loop>
        <td>{{ $medicine->name }}</td>
      </x-table.row>
    @endforeach
  </x-card.table>
@endsection
