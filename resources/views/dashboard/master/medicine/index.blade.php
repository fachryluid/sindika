@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Obat' => '',
    ],
])

@section('title', 'Obat')

@section('main')
  <x-card.table id="medicine" :columns="['Nama', 'Kategori', 'Jenis', 'Satuan', 'Stok', 'ED']" create-button-type="link" :create-route="route('master.medicine.create')">
    @foreach ($medicines as $medicine)
      <x-table.row :$loop :detail-route="route('master.medicine.show', $medicine->id)" :delete-route="route('master.medicine.destroy', $medicine->id)">
        <td>{{ $medicine->name }}</td>
        <td>{{ $medicine->category->name }}</td>
        <td>{{ $medicine->type->name }}</td>
        <td>{{ $medicine->unit->name }}</td>
        <td>{{ $medicine->stock }}</td>
        <td>{{ $medicine->expire_date }}</td>
      </x-table.row>
    @endforeach
  </x-card.table>
@endsection
