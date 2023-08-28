@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Supplier' => route('master.supplier.index'),
        'Tambah' => '',
    ],
])

@section('title', 'Data Supplier')

@section('main')
  <x-card.form :action="route('master.supplier.store')" title="Tambah data supplier">
    <x-form.input name="name" label="Nama Supplier" placeholder="Nama Supplier" />
    <x-form.input name="address" label="Alamat" placeholder="Alamat" />
    <x-form.input name="phone_number" label="No. Handphone" placeholder="No. Handphone" />
  </x-card.form>
@endsection
