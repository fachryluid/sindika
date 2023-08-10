@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Obat' => '',
    ],
])

@section('title', 'Obat')

@section('main')
  <x-card-table id="medicine" :create-route="route('master.medicine.create')" :columns="['Nama', 'Kategori', 'Jenis', 'Satuan', 'Stok', 'ED']">
    @foreach ($medicines as $medicine)
      <x-tr :$loop :detail-route="route('master.medicine.show', $medicine->id)" :delete-route="route('master.medicine.destroy', $medicine->id)">
        <td>{{ $medicine->name }}</td>
        <td>{{ $medicine->category->name }}</td>
        <td>{{ $medicine->type->name }}</td>
        <td>{{ $medicine->unit->name }}</td>
        <td>{{ $medicine->stock }}</td>
        <td>{{ $medicine->expire_date }}</td>
      </x-tr>
    @endforeach
  </x-card-table>
@endsection
