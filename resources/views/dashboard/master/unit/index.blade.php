@php
    $actions = [
      (object)[
            'type' => 'modal',
            'text' => 'Tambah',
            'color' => 'primary',
            'icon' => 'fa fa-plus',
            'id' => 'addUnit'
      ],
      (object)[
          'type' => 'link',
          'text' => 'Export Pdf',
          'color' => 'success',
          'icon' => 'fas fa-file-pdf',
          'url' => route('master.unit.create')
      ]
    ]
@endphp

@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Satuan' => '',
    ],
])

@section('title', 'Satuan')

@section('main')
  <x-card-table id="unit" :actions="$actions" :columns="['Nama Satuan']">
    @foreach ($units as $unit)
      <x-tr :$loop :detail-route="route('master.unit.show', $unit->uuid)" :delete-route="''">
        <td>{{ $unit->name }}</td>
      </x-tr>
    @endforeach
  </x-card-table>
@endsection

@section('modal')
  <x-modal :modal-id="'addUnit'" :title="'Tambah Satuan'">
    <form action="{{ route('master.unit.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group">
          <label for="unit">Satuan</label>
          <input type="text" class="form-control" name="name" id="unit" placeholder="Input Satuan">
          @error('name')
            <small class="text-danger float-right">{{ $message }}</small>
          @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </x-modal>
@endsection
