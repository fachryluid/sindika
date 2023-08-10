@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Kategori' => '',
    ],
])

@section('title', 'Kategori')

@section('main')
  <x-card-table id="category" :create-route="route('master.category.create')" :columns="['Nama Kategori']">
    @foreach ($categories as $category)
      <x-tr :$loop :detail-route="route('master.category.show', $category->id)" :delete-route="''">
        <td>{{ $category->name }}</td>
      </x-tr>
    @endforeach
  </x-card-table>
@endsection
