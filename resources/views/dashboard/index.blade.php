@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => '',
    ],
])

@section('title', 'Dashboard')

@section('main')
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <x-card-statistic icon="pills" title="Total Obat" value="256" color="primary" />
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <x-card-statistic icon="save" title="Stok Obat" value="230" color="success" />
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <x-card-statistic icon="times" title="Obat Habis" value="26" color="warning" />
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <x-card-statistic icon="trash" title="Obat Kadaluarsa" value="0" color="danger" />
    </div>
  </div>

  <div class="alert alert-info" style="font-size: 18px">
    <div class="alert-title" style="font-size: 24px">Selamat datang Administrator</div>
    Anda login sebagai Administrator.
  </div>
@endsection
