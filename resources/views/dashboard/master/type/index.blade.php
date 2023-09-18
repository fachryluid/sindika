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
      <x-table.row :$loop :id="$type->uuid"
        delete-confirm="Data obat terkait jenis {{ $type->name }} akan dihapus, apakah Anda ingin melanjutkan?"
        :detail-route="route('master.type.show', $type->uuid)" :delete-route="route('master.type.destroy', $type->uuid)" :edit-route="route('master.type.update', $type->uuid)" edit-button-type="modal"
        edit-title="Edit data jenis {{ $type->name }}">
        <td>{{ $type->name }}</td>

        <x-slot:edit-form>
          <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama jenis obat"
            value="{{ $type->name }}" />
        </x-slot:edit-form>
      </x-table.row>
    @endforeach

    <x-slot:create-form>
      <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama jenis obat">
    </x-slot:create-form>
  </x-card.table>
@endsection
