@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Supplier' => route('master.supplier.index'),
        'Edit' => '',
    ],
])

@section('title', 'Data Supplier')

@section('main')
  <x-card.form :action="route('master.supplier.update', $supplier->uuid)" title="Edit data supplier" method="PUT">
    <x-slot:card-header>
      <x-button.back :route="route('master.supplier.index')" class="note-btn" />
      <x-button.detail :route="route('master.supplier.show', $supplier->uuid)" class="note-btn" />
      <x-button.delete :id="$supplier->uuid" :route="route('master.supplier.destroy', $supplier->uuid)" class="note-btn"
        confirm="Data supplier {{ $supplier->name }} akan dihapus, apakah Anda ingin melanjutkan?" />
    </x-slot:card-header>

    <x-form.input type="text" name="name" label="Nama Supplier" placeholder="Nama Supplier"
      value="{{ $supplier->name }}" />
    <x-form.input type="text" name="address" label="Alamat" placeholder="Alamat" value="{{ $supplier->address }}" />
    <x-form.input type="phone" name="phone_number" label="No. Handphone" placeholder="No. Handphone"
      value="{{ formatPhoneNumber($supplier->phone_number) }}" />
  </x-card.form>
@endsection
