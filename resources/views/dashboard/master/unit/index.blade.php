@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Satuan' => '',
    ],
])

@section('title', 'Satuan')

@section('main')
  <x-card-table id="unit" :create-route="route('master.unit.create')" :columns="['Nama Satuan']">
    @foreach ($units as $unit)
      <x-tr :$loop :detail-route="route('master.unit.show', $unit->id)" :delete-route="''">
        <td>{{ $unit->name }}</td>
      </x-tr>
    @endforeach
  </x-card-table>
@endsection
