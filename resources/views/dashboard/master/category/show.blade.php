@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Kategori' => route('master.category.index'),
        'Detail' => '',
    ],
])

@section('title', "Kategori - {$category->name}")

@section('main')
  <x-card.table id="category" title="Data Kategori Obat {{ $category->name }}" :columns="['Nama Obat']" no-actions-field>
    @foreach ($category->medicines as $medicine)
      <x-table.row :$loop>
        <td>{{ $medicine->name }}</td>
      </x-table.row>
    @endforeach

    <x-slot:card-footer>
      <div class="text-right">
        <x-button type="link" route="{{ route('master.category.index') }}" color="secondary" class="mr-2">
          <i class="fas fa-arrow-left"></i>
          Kembali
        </x-button>

        <x-button.delete :id="$category->uuid" route="{{ route('master.category.destroy', $category->uuid) }}" text="Hapus Data Kategori Ini" />
      </div>
    </x-slot:card-footer>
  </x-card.table>
@endsection
