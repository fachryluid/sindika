@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Kategori' => '',
    ],
])

@section('title', 'Kategori')

@section('main')
  <x-card-table id="category" :columns="['Nama Kategori']" create-button-type="modal" :create-route="route('master.category.store')"
    modal-title="Tambah Kategori Obat">
    @foreach ($categories as $category)
      <x-tr :$loop :detail-route="route('master.category.show', $category->id)" :delete-route="''">
        <td>{{ $category->name }}</td>
      </x-tr>
    @endforeach

    <x-slot:create-form>
      <input type="text" class="form-control mb-3" name="name" placeholder="Masukkan nama kategori obat">
    </x-slot:create-form>
  </x-card-table>
@endsection
