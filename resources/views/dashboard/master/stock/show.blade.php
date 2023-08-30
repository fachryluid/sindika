@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Stok' => route('master.stock.index'),
        'Detail' => '',
    ],
])

@section('title', 'Detail Stok')

@section('main')
  <x-card title="Detail Stok">
    <x-slot:card-header>
      <x-button.back :route="route('master.stock.index')" class="note-btn" />
      <x-button.edit :route="route('master.stock.edit', $stock->uuid)" class="note-btn" />
      <x-button.delete :id="$stock->uuid" :route="route('master.stock.destroy', $stock->uuid)" class="note-btn"
        confirm="Data stok ini akan dihapus, apakah Anda ingin melanjutkan?" />
    </x-slot:card-header>

    <h3>{{ $stock->uuid }}</h3>
  </x-card>
@endsection
