@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Jenis' => '',
    ],
])

@section('title', 'Jenis')

@section('main')
  <x-card-table id="type" :create-route="route('master.type.create')" :columns="['Nama Jenis']">
    @foreach ($types as $type)
      <x-tr :$loop :detail-route="route('master.type.show', $type->id)" :delete-route="''">
        <td>{{ $type->name }}</td>
      </x-tr>
    @endforeach
  </x-card-table>
@endsection
