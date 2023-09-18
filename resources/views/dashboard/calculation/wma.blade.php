@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Perhitungan' => '',
        'WMA' => '',
    ],
])

@section('title', 'WMA')

@section('main')
  <x-alert.icon type="info" title="Information">
    <p>
      Peramalan stok obat ini menggunakan metode <strong>Weighted Moving Average</strong>. Cara kerja metode ini adalah
      dengan melibatkan data penjualan 2-4 bulan sebelumnya untuk memproyeksikan data penjualan bulan depant untuk setiap
      data obat yang dipilih.
    </p>
  </x-alert.icon>

  <x-calculation.form-card :action="route('calculation.calculate.wma')" title="Hitung WMA Per Bulan" inputId="wma-input" :$medicines method="GET" />
@endsection
