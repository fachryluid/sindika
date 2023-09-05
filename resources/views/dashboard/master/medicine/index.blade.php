@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Obat' => '',
    ],
])

@section('title', 'Obat')

@section('main')
  <x-card.table id="medicine" :columns="['Nama', 'Satuan', 'Jenis', 'Kategori']" create-button-type="link" :create-route="route('master.medicine.create')">
    @foreach ($medicines as $medicine)
      <x-table.row :$loop :id="$medicine->uuid"
        delete-confirm="Data obat {{ $medicine->name }} akan dihapus, apakah Anda ingin melanjutkan?" :edit-route="route('master.medicine.edit', $medicine->uuid)"
        :detail-route="route('master.medicine.show', $medicine->uuid)" :delete-route="route('master.medicine.destroy', $medicine->uuid)">
        <td>{{ $medicine->name }}</td>
        <td>{{ $medicine->unit->name }}</td>
        <td>{{ $medicine->type->name }}</td>
        <td>{{ $medicine->category->name }}</td>
        {{-- <td>
          <a href="{{ $medicine->image }}">
            <img src="{{ $medicine->image }}" alt="{{ $medicine->name }}" class="img-fluid"
              style="--size: 30px; max-height: var(--size); max-width: var(--size); object-fit: contain;">
          </a>
        </td> --}}
      </x-table.row>
    @endforeach
  </x-card.table>
@endsection
