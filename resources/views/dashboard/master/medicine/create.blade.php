@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Obat' => route('master.medicine.index'),
        'Tambah' => '',
    ],
])

@section('title', 'Data Obat')

@section('main')
  <x-card.form :action="route('master.medicine.store')" title="Tambah data obat bulan ini">
    <x-form.input name="name" label="Nama Obat" placeholder="Nama obat" />
  </x-card.form>
@endsection
