@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => '',
    ],
])

@section('title', 'Dashboard')

@section('main')
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <x-card.statistic icon="pills" title="Total Obat" value="{{ $totalMedicine }}" color="primary" />
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <x-card.statistic icon="save" title="Stok Obat" value="{{ $totalStock }}" color="success" />
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <x-card.statistic icon="times" title="Obat Habis" value="{{ $emptyStock }}" color="warning" />
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <x-card.statistic icon="trash" title="Obat Kadaluarsa" value="{{ $totalExpiredQuantity }}" color="danger" />
    </div>
  </div>

  <div class="alert alert-info" style="font-size: 18px">
    <div class="alert-title" style="font-size: 24px">Selamat datang {{ auth()->user()->name }}</div>
    Anda login sebagai [{{ auth()->user()->role }}].
  </div>
@endsection
