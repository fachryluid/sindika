@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Satuan' => '',
    ],
])

@section('title', 'Satuan')

@push('css')
  <link rel="stylesheet" href="{{ asset('/css/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
  <div class="card">
    <div class="card-header">
      <a href="{{ route('master.unit.create') }}" class="btn btn-primary note-btn">
        <i class="fa fa-plus"></i>
        Tambah
      </a>
    </div>
    <div class="card-body">
      <x-datatable id="satuan" :columns="['Nama Satuan']">
        @foreach ($units as $unit)
          <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $unit->name }}</td>
            <td>
              <a href="{{ route('master.unit.show', $unit->id) }}" class="btn btn-success">Detail</a>
            </td>
          </tr>
        @endforeach
      </x-datatable>
    </div>
  </div>
@endsection
