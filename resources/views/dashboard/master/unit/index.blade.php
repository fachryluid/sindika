@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Satuan' => '',
    ],
])

@section('title', 'Satuan')

@section('main')
  <x-card-table id="unit" :columns="['Nama Satuan']" create-button-type="modal" modal-title="Tambah Satuan Obat"
    input-placeholder="Masukkan nama satuan obat">
    <x-slot:actions>
      <a href="#" class="btn btn-success note-btn mr-2">
        <i class="fas fa-file-pdf"></i>
        Export PDF
      </a>
    </x-slot:actions>

    @foreach ($units as $unit)
      <x-tr :$loop :detail-route="route('master.unit.show', $unit->uuid)" :delete-route="''">
        <td>{{ $unit->name }}</td>
      </x-tr>
    @endforeach
  </x-card-table>
@endsection
