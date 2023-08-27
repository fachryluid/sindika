@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Kategori' => '',
    ],
])

@section('title', 'Kategori')

@section('main')
  <x-card.table id="category" :columns="['Nama Kategori']" create-button-type="modal" :create-route="route('master.category.store')"
    modal-title="Tambah Kategori Obat">
    @foreach ($categories as $category)
      <x-table.row :$loop :id="$category->uuid"
        delete-confirm="Data obat terkait kategori {{ $category->name }} akan dihapus, apakah Anda ingin melanjutkan?"
        :detail-route="route('master.category.show', $category->uuid)" :delete-route="route('master.category.destroy', $category->uuid)">
        <td>{{ $category->name }}</td>
      </x-table.row>
    @endforeach

    <x-slot:create-form>
      <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama kategori obat">
    </x-slot:create-form>
  </x-card.table>
@endsection
