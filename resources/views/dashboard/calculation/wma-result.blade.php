@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Perhitungan' => '',
        'WMA' => route('calculation.wma'),
        'Hasil' => '',
    ],
])

@section('title', 'Hasil Peramalan WMA')

@section('main')
<div class="mb-3 text-right">
  <a href="{{ route('excel.cetak-wma', $medicine->uuid) }}" class="btn btn-warning">
    <i class="fas fa-print"></i>
    Cetak
  </a>
</div>

<div class="card">
  <div class="card-body">
    <h4 class="text-center text-primary mb-0">{{ $medicine->name }}</h4>
  </div>
</div>
  
<div class="card">
  <div class="card-body">
  <h5 class="text-center text-primary mb-3">RAMALAN 2 PERIODE</h5>
  <table class="table table-hover table-sm">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th>Bulan/Tahun</th>
        <th>Penjualan Aktual</th>
        <th>Ramalan 2 Periode</th>
        <th>Error</th>
        <th>[Error]</th>
        <th>Error^2</th>
        <th>% Error</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($wma2Periode->wmaPeriodeCalc as $wmaPeriodeCalc)
      <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $wmaPeriodeCalc->date }}</td>
        <td>{{ $wmaPeriodeCalc->quantitySold }}</td>
        <td>{{ $wmaPeriodeCalc->ft }}</td>
        <td>{{ $wmaPeriodeCalc->error }}</td>
        <td>{{ $wmaPeriodeCalc->absError }}</td>
        <td>{{ $wmaPeriodeCalc->squareError }}</td>
        <td>{{ $wmaPeriodeCalc->percentError }}</td>
      </tr>
      @endforeach
      <tr>
        <td class="text-center">{{ count($wma2Periode->wmaPeriodeCalc)+1 }}</td>
        <td>NEXT MONTH</td>
        <td>?</td>
        <td>{{ $wma2Periode->wmaPeriodeResult->nextFt }}</td>
        <th class="bg-secondary">JUMLAH</th>
        <td class="bg-secondary">{{ $wma2Periode->wmaPeriodeResult->totalError }}</td>
        <td class="bg-secondary">{{ $wma2Periode->wmaPeriodeResult->totalSquareError }}</td>
        <td class="bg-secondary">{{ $wma2Periode->wmaPeriodeResult->totalPercentError }}</td>
      </tr>
      <tr>
        <td class="text-center">{{ count($wma2Periode->wmaPeriodeCalc)+2 }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="bg-warning">{{ $wma2Periode->wmaPeriodeResult->MAD }}</td>
        <td class="bg-warning">{{ $wma2Periode->wmaPeriodeResult->MSE }}</td>
        <td class="bg-warning">{{ $wma2Periode->wmaPeriodeResult->MAPE }}</td>
      </tr>
      <tr>
        <td class="text-center">{{ count($wma2Periode->wmaPeriodeCalc)+3 }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-warning">MAD</th>
        <th class="bg-warning">MSE</th>
        <th class="bg-warning">MAPE</th>
      </tr>
    </tbody>
  </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
  <h5 class="text-center text-primary mb-3">RAMALAN 3 PERIODE</h5>
  <table class="table table-hover table-sm">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th>Bulan/Tahun</th>
        <th>Penjualan Aktual</th>
        <th>Ramalan 3 Periode</th>
        <th>Error</th>
        <th>[Error]</th>
        <th>Error^2</th>
        <th>% Error</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($wma3Periode->wmaPeriodeCalc as $wmaPeriodeCalc)
      <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $wmaPeriodeCalc->date }}</td>
        <td>{{ $wmaPeriodeCalc->quantitySold }}</td>
        <td>{{ $wmaPeriodeCalc->ft }}</td>
        <td>{{ $wmaPeriodeCalc->error }}</td>
        <td>{{ $wmaPeriodeCalc->absError }}</td>
        <td>{{ $wmaPeriodeCalc->squareError }}</td>
        <td>{{ $wmaPeriodeCalc->percentError }}</td>
      </tr>
      @endforeach
      <tr>
        <td class="text-center">{{ count($wma3Periode->wmaPeriodeCalc)+1 }}</td>
        <td>NEXT MONTH</td>
        <td>?</td>
        <td>{{ $wma3Periode->wmaPeriodeResult->nextFt }}</td>
        <th class="bg-secondary">JUMLAH</th>
        <td class="bg-secondary">{{ $wma3Periode->wmaPeriodeResult->totalError }}</td>
        <td class="bg-secondary">{{ $wma3Periode->wmaPeriodeResult->totalSquareError }}</td>
        <td class="bg-secondary">{{ $wma3Periode->wmaPeriodeResult->totalPercentError }}</td>
      </tr>
      <tr>
        <td class="text-center">{{ count($wma3Periode->wmaPeriodeCalc)+2 }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="bg-warning">{{ $wma3Periode->wmaPeriodeResult->MAD }}</td>
        <td class="bg-warning">{{ $wma3Periode->wmaPeriodeResult->MSE }}</td>
        <td class="bg-warning">{{ $wma3Periode->wmaPeriodeResult->MAPE }}</td>
      </tr>
      <tr>
        <td class="text-center">{{ count($wma3Periode->wmaPeriodeCalc)+3 }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-warning">MAD</th>
        <th class="bg-warning">MSE</th>
        <th class="bg-warning">MAPE</th>
      </tr>
    </tbody>
  </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
  <h5 class="text-center text-primary mb-3">RAMALAN 4 PERIODE</h5>
  <table class="table table-hover table-sm">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th>Bulan/Tahun</th>
        <th>Penjualan Aktual</th>
        <th>Ramalan 4 Periode</th>
        <th>Error</th>
        <th>[Error]</th>
        <th>Error^2</th>
        <th>% Error</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($wma4Periode->wmaPeriodeCalc as $wmaPeriodeCalc)
      <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $wmaPeriodeCalc->date }}</td>
        <td>{{ $wmaPeriodeCalc->quantitySold }}</td>
        <td>{{ $wmaPeriodeCalc->ft }}</td>
        <td>{{ $wmaPeriodeCalc->error }}</td>
        <td>{{ $wmaPeriodeCalc->absError }}</td>
        <td>{{ $wmaPeriodeCalc->squareError }}</td>
        <td>{{ $wmaPeriodeCalc->percentError }}</td>
      </tr>
      @endforeach
      <tr>
        <td class="text-center">{{ count($wma4Periode->wmaPeriodeCalc)+1 }}</td>
        <td>NEXT MONTH</td>
        <td>?</td>
        <td>{{ $wma4Periode->wmaPeriodeResult->nextFt }}</td>
        <th class="bg-secondary">JUMLAH</th>
        <td class="bg-secondary">{{ $wma4Periode->wmaPeriodeResult->totalError }}</td>
        <td class="bg-secondary">{{ $wma4Periode->wmaPeriodeResult->totalSquareError }}</td>
        <td class="bg-secondary">{{ $wma4Periode->wmaPeriodeResult->totalPercentError }}</td>
      </tr>
      <tr>
        <td class="text-center">{{ count($wma4Periode->wmaPeriodeCalc)+2 }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="bg-warning">{{ $wma4Periode->wmaPeriodeResult->MAD }}</td>
        <td class="bg-warning">{{ $wma4Periode->wmaPeriodeResult->MSE }}</td>
        <td class="bg-warning">{{ $wma4Periode->wmaPeriodeResult->MAPE }}</td>
      </tr>
      <tr>
        <td class="text-center">{{ count($wma4Periode->wmaPeriodeCalc)+3 }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-warning">MAD</th>
        <th class="bg-warning">MSE</th>
        <th class="bg-warning">MAPE</th>
      </tr>
    </tbody>
  </table>
  </div>
</div>
<div class="card">
  <div class="card-body px-5">
    <h6 class="text-center">Berdasarkan perhitungan dari ketiga tabel periode tersebut, peramalan yang dianjurkan untuk digunakan adalah </h6>
    <h5 class="bg-primary text-center text-white font-bold py-1">{{ $recomendation }}</h5>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="text-center text-primary mb-3">Grafik</h5>
    <canvas id="myChart"></canvas>
  </div>
</div>

@push('js')
  <script src="{{ asset('/js/chart.min.js') }}"></script>
  <script>
    "use strict";

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: @json($labels),
    datasets: @json($datasets)
  },
  options: {
    legend: {
      display: true
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
      }],
      xAxes: [{
        ticks: {
          display: true
        },
        gridLines: {
          display: true
        }
      }]
    },
  }
});
  </script>
@endpush
@endsection


