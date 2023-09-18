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
        :detail-route="route('master.category.show', $category->uuid)" :delete-route="route('master.category.destroy', $category->uuid)" :edit-route="route('master.category.update', $category->uuid)" edit-button-type="modal"
        edit-title="Edit data kategori {{ $category->name }}">
        <td>{{ $category->name }}</td>

        <x-slot:edit-form>
          <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama kategori obat"
            value="{{ $category->name }}">
        </x-slot:edit-form>
      </x-table.row>
    @endforeach

    <x-slot:create-form>
      <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama kategori obat">
    </x-slot:create-form>
  </x-card.table>
@endsection
