@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Obat' => route('master.medicine.index'),
        'Edit' => '',
    ],
])

@section('title', 'Data Obat')

@section('main')
  <x-card.form :action="route('master.medicine.update', $medicine->uuid)" method="PUT" title="Edit data obat {{ $medicine->name }}" send-files>
    <x-form.input type="text" name="name" label="Nama Obat" placeholder="Nama obat" value="{{ $medicine->name }}" />
    <x-form.input type="select" name="unit_id" label="Satuan" placeholder="Pilih Satuan">
      @foreach ($units as $unit)
        <option value="{{ $unit->id }}" @selected($medicine->unit->id == $unit->id)>{{ $unit->name }}</option>
      @endforeach
    </x-form.input>
    <x-form.input type="select" name="type_id" label="Jenis" placeholder="Pilih Jenis">
      @foreach ($types as $type)
        <option value="{{ $type->id }}" @selected($medicine->type->id == $type->id)>{{ $type->name }}</option>
      @endforeach
    </x-form.input>
    <x-form.input type="select" name="category_id" label="Kategori" placeholder="Pilih Kategori">
      @foreach ($categories as $category)
        <option value="{{ $category->id }}" @selected($medicine->category->id == $category->id)>{{ $category->name }}</option>
      @endforeach
    </x-form.input>
    <x-form.input type="image" name="image" label="Gambar Obat" optional />
  </x-card.form>
@endsection
