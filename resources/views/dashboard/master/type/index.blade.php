@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Jenis' => '',
    ],
])

@section('title', 'Jenis')

@section('main')
  <x-card.table id="type" :columns="['Nama Jenis']" create-button-type="modal" :create-route="route('master.type.store')" modal-title="Tambah Jenis Obat">
    @foreach ($types as $type)
      <x-table.row :$loop :detail-route="route('master.type.show', $type->id)" :delete-route="''">
        <td>{{ $type->name }}</td>
      </x-table.row>
    @endforeach

    <x-slot:create-form>
      <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama jenis obat">
    </x-slot:create-form>
  </x-card.table>
@endsection
