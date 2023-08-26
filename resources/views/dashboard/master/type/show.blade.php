@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Master' => '',
        'Jenis' => route('master.type.index'),
        'Detail' => '',
    ],
])

@section('title', "Jenis - {$type->name}")

@section('main')
  <x-card.table id="type" title="Data Jenis Obat {{ $type->name }}" :columns="['Nama Obat']" no-actions-field>
    @foreach ($type->medicines as $medicine)
      <x-table.row :$loop>
        <td>{{ $medicine->name }}</td>
      </x-table.row>
    @endforeach

    <x-slot:card-footer>
      <div class="text-right">
        <x-button type="link" route="{{ route('master.type.index') }}" color="secondary" class="mr-2">
          <i class="fas fa-arrow-left"></i>
          Kembali
        </x-button>

        <x-button.delete route="{{ route('master.type.destroy', $type->uuid) }}" text="Hapus Data Jenis Ini" />
      </div>
    </x-slot:card-footer>
  </x-card.table>
@endsection
