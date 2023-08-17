@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Obat' => '',
    ],
])

@section('title', 'Obat')

@section('main')
  <x-card.table id="medicine" :columns="['Nama', 'Stok Awal', 'Stok Terjual', 'B Pesan (Rp)', 'B Simpan (Rp)', 'LT (Hari)', 'ED']" create-button-type="link" :create-route="route('master.medicine.create')">
    @foreach ($medicines as $medicine)
      <x-table.row :$loop :edit-route="route('master.medicine.edit', $medicine->uuid)" :detail-route="route('master.medicine.show', $medicine->uuid)" :delete-route="route('master.medicine.destroy', $medicine->uuid)">
        <td>{{ $medicine->name }}</td>
        <td>50</td>
        <td>40</td>
        <td>1000</td>
        <td>1000</td>
        <td>3</td>
        <td>{{ $medicine->expire_date }}</td>
      </x-table.row>
    @endforeach
  </x-card.table>
@endsection
