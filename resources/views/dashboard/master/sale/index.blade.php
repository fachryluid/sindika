@extends('layouts.master', [
'breadcrumbs' => [
'Dashboard' => route('dashboard.index'),
'Master' => '',
'Penjualan' => '',
],
])

@section('title', 'Penjualan')

@section('main')
<x-card.table id="sale" :columns="['Nama Obat', 'Stok Awal', 'Stok Terjual', 'Stok Tersisa']" :no-actions-field="true">
  <x-slot:actions>
    <x-button type="button" class="note-btn mr-2" data-toggle="modal" data-target="#modal-cetak-format" role="button">
      <i class="fa fa-file-excel"></i>
      Cetak Format
    </x-button>
    <x-button type="button" color="success" class="note-btn mr-2" data-toggle="modal" data-target="#modal-import" role="button">
      <i class="fas fa-file-excel"></i>
      Import
    </x-button>
    {{-- <x-button type="link" route="#" color="danger" class="note-btn mr-2">
      <i class="fas fa-file-excel"></i>
      Import
    </x-button> --}}
  </x-slot:actions>

  @foreach ($medicines as $medicine)
    <x-table.row :$loop :id="$medicine->uuid">
      <td>{{ $medicine->medicineName }}</td>
      <td>{{ $medicine->initialStock }}</td>
      <td>{{ $medicine->quantitySold }}</td>
      <td>{{ $medicine->currentStock }}</td>
    </x-table.row>
  @endforeach

</x-card.table>
<x-modal id="cetak-format" title="Cetak Format" :no-footer="true">
  <form action="{{ route('master.sale.cetak-format') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="start_date">Dari</label>
          <input type="date" class="form-control " id="start_date" name="start_date" placeholder="Tanggal Mulai" required />
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="finish_date">Sampai</label>
          <input type="date" class="form-control " id="finish_date" name="finish_date" placeholder="Tanggal Selesai" required />
        </div>
      </div>
    </div>
    <div class="text-right">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-primary ml-2">Simpan</button>
    </div>
  </form>
</x-modal>
<x-modal id="import" title="Import Penjualan" :no-footer="true">
  <form action="{{ route('master.sale.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="file">Pilih File</label>
      <input type="file" class="form-control " id="file" name="file" required/>
    </div>
    <div class="text-right">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-primary ml-2">Simpan</button>
    </div>
  </form>
</x-modal>
@endsection
