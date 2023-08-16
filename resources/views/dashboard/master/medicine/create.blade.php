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
  <x-card.form :action="route('master.medicine.store')">
    <x-form.input name="name" label="Nama Obat" />
  </x-card.form>
@endsection
