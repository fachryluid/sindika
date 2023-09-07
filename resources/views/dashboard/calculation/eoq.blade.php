@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Perhitungan' => '',
        'EOQ' => '',
    ],
])

@section('title', 'EOQ')

@section('main')
  <x-alert.icon type="info" title="Information">
    <p>
      EOQ adalah suatu cara untuk mengelola jumlah stok agar biaya yang dikeluarkan oleh perusahaan bisa seefisien
      mungkin dan tetap terjaga agar persediaan stok tetap stabil. Tujuan metode EOQ ini untuk menentukan jumlah pembelian
      yang optimal, sehingga dapat memperoleh pengendalian persediaan yang juga optimal.
    </p>
  </x-alert.icon>
  <div class="mb-3 text-right">
    <a href="{{ route('excel.cetak-eoq') }}" class="btn btn-warning">
      <i class="fas fa-print"></i>
      Cetak
    </a>
  </div>
  <table class="table table-hover table-sm">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Obat</th>
        <th scope="col">Jumlah Kebutuhan Obat/Tahun</th>
        <th scope="col">Harga</th>
        <th scope="col">Biaya Pesan</th>
        <th scope="col">Biaya Simpan</th>
        <th scope="col">EOQ</th>
        <th scope="col">Frekuensi Pemesanan</th>
        <th scope="col">Total Biaya Pesan</th>
        <th scope="col">Total Biaya Simpan</th>
        <th scope="col">Total Biaya Persediaan</th>
        <th scope="col">Safety Stock</th>
        <th scope="col">Reorder Point</th>
        <th scope="col">Lead Time / Waktu Tunggu Obat</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($eoqs as $eoq)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $eoq->medicine }}</td>
        <td>{{ $eoq->_R }}</td>
        <td>{{ number_format($eoq->price, 0, '.') }}</td>
        <td>{{ number_format($eoq->orderCost, 0, '.') }}</td>
        <td>{{ number_format($eoq->storageCost, 0, '.') }}</td>
        <td>{{ $eoq->_EOQ }}</td>
        <td>{{ $eoq->orderFrequency }}</td>
        <td>{{ number_format($eoq->_O, 0, '.') }}</td>
        <td>{{ number_format($eoq->_C, 0, '.') }}</td>
        <td>{{ number_format($eoq->stockTotalCost, 0, '.') }}</td>
        <td>{{ $eoq->_SS }}</td>
        <td>{{ $eoq->_ROP }}</td>
        <td>{{ $eoq->_LT }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
