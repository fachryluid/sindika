@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Satuan' => '',
    ],
])

@section('title', 'Satuan')

@section('main')
  <x-card-table id="unit" :columns="['Nama Satuan']" create-button-type="modal" :create-route="route('master.unit.store')" modal-title="Tambah Satuan Obat">
    <x-slot:actions>
      <x-button type="link" color="success" class="note-btn">
        <i class="fas fa-file-excel"></i>
        Export Excel
      </x-button>
    </x-slot:actions>

    @foreach ($units as $unit)
      <x-tr :$loop :detail-route="route('master.unit.show', $unit->uuid)" :delete-route="''">
        <td>{{ $unit->name }}</td>
      </x-tr>
    @endforeach

    <x-slot:create-form>
      <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama satuan obat">
    </x-slot:create-form>
  </x-card-table>
@endsection
