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

  <x-calculation.form-card title="Hitung EOQ Per Tahun" inputId="eoq-input" :$medicines />
@endsection
