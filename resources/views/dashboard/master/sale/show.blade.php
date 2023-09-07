@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Sale' => route('master.sale.index'),
        'Detail' => '',
    ],
])

@section('title', 'Detail Penjualan ' . $medicine->name)

@section('main')
  <x-card.table id="sale" :columns="['Bulan', 'Terjual']" no-actions-field>
    <x-slot:actions>
      <x-button.back :route="route('master.sale.index')" class="note-btn" />
    </x-slot:actions>

    @foreach ($sales as $sale)
      <x-table.row :$loop :id="$medicine->uuid">
        <td>{{ $sale->date }}</td>
        <td>{{ $sale->quantity_sold }}</td>
      </x-table.row>
    @endforeach
  </x-card.table>
@endsection
