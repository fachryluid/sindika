@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Satuan' => '',
    ],
])

@section('title', 'Satuan')

@section('main')
  <x-card.table id="unit" :columns="['Nama Satuan']" create-button-type="modal" :create-route="route('master.unit.store')" modal-title="Tambah Satuan Obat">
    @foreach ($units as $unit)
      <x-table.row :$loop :id="$unit->uuid"
        delete-confirm="Data terkait satuan {{ $unit->name }} akan dihapus, apakah Anda ingin melanjutkan?"
        :detail-route="route('master.unit.show', $unit->uuid)" :delete-route="route('master.unit.destroy', $unit->uuid)" :edit-route="route('master.unit.update', $unit->uuid)" edit-button-type="modal"
        edit-title="Edit data satuan {{ $unit->name }}">
        <td>{{ $unit->name }}</td>

        <x-slot:edit-form>
          <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama satuan obat"
            value="{{ $unit->name }}" />
        </x-slot:edit-form>
      </x-table.row>
    @endforeach

    <x-slot:create-form>
      <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama satuan obat">
    </x-slot:create-form>
  </x-card.table>
@endsection
