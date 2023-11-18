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
  <table class="table table-hover table-sm {{ $periodeTerendah == 2 ? 'table-info rounded' : null }}">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th>Bulan/Tahun</th>
        <th>Penjualan Aktual</th>
        <th>Ramalan 2 Periode</th>
        {{-- <th>Error</th>
        <th>[Error]</th>
        <th>Error^2</th>
        <th>% Error</th> --}}
      </tr>
    </thead>
    <tbody>
      @foreach ($wma2Periode->wmaPeriodeCalc as $wmaPeriodeCalc)
      <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $wmaPeriodeCalc->date }}</td>
        <td>{{ $wmaPeriodeCalc->quantitySold }}</td>
        <td>{{ $wmaPeriodeCalc->ft }}</td>
        {{-- <td>{{ $wmaPeriodeCalc->error }}</td>
        <td>{{ $wmaPeriodeCalc->absError }}</td>
        <td>{{ $wmaPeriodeCalc->squareError }}</td>
        <td>{{ $wmaPeriodeCalc->percentError }}</td> --}}
      </tr>
      @endforeach
      <tr>
        <td class="text-center">{{ count($wma2Periode->wmaPeriodeCalc)+1 }}</td>
        <td>NEXT MONTH</td>
        <td>?</td>
        <td>{{ $wma2Periode->wmaPeriodeResult->nextFt }}</td>
        {{-- <th class="table-primary">JUMLAH</th>
        <td class="table-primary">{{ $wma2Periode->wmaPeriodeResult->totalError }}</td>
        <td class="table-primary">{{ $wma2Periode->wmaPeriodeResult->totalSquareError }}</td>
        <td class="table-primary">{{ $wma2Periode->wmaPeriodeResult->totalPercentError }}</td> --}}
      </tr>
      <tr>
        {{-- <td class="text-center">#</td> --}}
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-warning text-white text-center d-flex justify-content-center align-items-center">
          <h6 class="mb-0 mr-3">MAPE = {{ $wma2Periode->wmaPeriodeResult->MAPE }}</h6>
          <i class="fa fa-info-circle" data-toggle="tooltip" title="MAPE atau sering disebut rata-rata kesalahan absolut pada dasarnya menghitung kesalahan dalam bentuk persentase kesalahan hasil prediksi terhadap permintaan aktual selama rentang waktu tertentu yang dimana persentasi ini bisa saja tinggi ataupun rendah"></i>
        </th>
      </tr>
    </tbody>
  </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
  <h5 class="text-center text-primary mb-3">RAMALAN 3 PERIODE</h5>
  <table class="table table-hover table-sm {{ $periodeTerendah == 3 ? 'table-info rounded' : null }}">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th>Bulan/Tahun</th>
        <th>Penjualan Aktual</th>
        <th>Ramalan 3 Periode</th>
        {{-- <th>Error</th>
        <th>[Error]</th>
        <th>Error^2</th>
        <th>% Error</th> --}}
      </tr>
    </thead>
    <tbody>
      @foreach ($wma3Periode->wmaPeriodeCalc as $wmaPeriodeCalc)
      <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $wmaPeriodeCalc->date }}</td>
        <td>{{ $wmaPeriodeCalc->quantitySold }}</td>
        <td>{{ $wmaPeriodeCalc->ft }}</td>
        {{-- <td>{{ $wmaPeriodeCalc->error }}</td>
        <td>{{ $wmaPeriodeCalc->absError }}</td>
        <td>{{ $wmaPeriodeCalc->squareError }}</td>
        <td>{{ $wmaPeriodeCalc->percentError }}</td> --}}
      </tr>
      @endforeach
      <tr>
        <td class="text-center">{{ count($wma3Periode->wmaPeriodeCalc)+1 }}</td>
        <td>NEXT MONTH</td>
        <td>?</td>
        <td>{{ $wma3Periode->wmaPeriodeResult->nextFt }}</td>
        {{-- <th class="table-primary">JUMLAH</th>
        <td class="table-primary">{{ $wma3Periode->wmaPeriodeResult->totalError }}</td>
        <td class="table-primary">{{ $wma3Periode->wmaPeriodeResult->totalSquareError }}</td>
        <td class="table-primary">{{ $wma3Periode->wmaPeriodeResult->totalPercentError }}</td> --}}
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-warning text-white text-center d-flex justify-content-center align-items-center">
          <h6 class="mb-0 mr-3">MAPE = {{ $wma3Periode->wmaPeriodeResult->MAPE }}</h1>
          <i class="fa fa-info-circle" data-toggle="tooltip" title="MAPE atau sering disebut rata-rata kesalahan absolut pada dasarnya menghitung kesalahan dalam bentuk persentase kesalahan hasil prediksi terhadap permintaan aktual selama rentang waktu tertentu yang dimana persentasi ini bisa saja tinggi ataupun rendah"></i>
        </th>
      </tr>
    </tbody>
  </table>
  </div>
</div>

<div class="card">
  <div class="card-body">
  <h5 class="text-center text-primary mb-3">RAMALAN 4 PERIODE</h5>
  <table class="table table-hover table-sm {{ $periodeTerendah == 4 ? 'table-info rounded' : null }}">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th>Bulan/Tahun</th>
        <th>Penjualan Aktual</th>
        <th>Ramalan 4 Periode</th>
        {{-- <th>Error</th>
        <th>[Error]</th>
        <th>Error^2</th>
        <th>% Error</th> --}}
      </tr>
    </thead>
    <tbody>
      @foreach ($wma4Periode->wmaPeriodeCalc as $wmaPeriodeCalc)
      <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td>{{ $wmaPeriodeCalc->date }}</td>
        <td>{{ $wmaPeriodeCalc->quantitySold }}</td>
        <td>{{ $wmaPeriodeCalc->ft }}</td>
        {{-- <td>{{ $wmaPeriodeCalc->error }}</td>
        <td>{{ $wmaPeriodeCalc->absError }}</td>
        <td>{{ $wmaPeriodeCalc->squareError }}</td>
        <td>{{ $wmaPeriodeCalc->percentError }}</td> --}}
      </tr>
      @endforeach
      <tr>
        <td class="text-center">{{ count($wma4Periode->wmaPeriodeCalc)+1 }}</td>
        <td>NEXT MONTH</td>
        <td>?</td>
        <td>{{ $wma4Periode->wmaPeriodeResult->nextFt }}</td>
        {{-- <th class="table-primary">JUMLAH</th>
        <td class="table-primary">{{ $wma4Periode->wmaPeriodeResult->totalError }}</td>
        <td class="table-primary">{{ $wma4Periode->wmaPeriodeResult->totalSquareError }}</td>
        <td class="table-primary">{{ $wma4Periode->wmaPeriodeResult->totalPercentError }}</td> --}}
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <th class="bg-warning text-white text-center d-flex justify-content-center align-items-center">
          <h6 class="mb-0 mr-3">MAPE = {{ $wma4Periode->wmaPeriodeResult->MAPE }}</h6>
          <i class="fa fa-info-circle" data-toggle="tooltip" title="MAPE atau sering disebut rata-rata kesalahan absolut pada dasarnya menghitung kesalahan dalam bentuk persentase kesalahan hasil prediksi terhadap permintaan aktual selama rentang waktu tertentu yang dimana persentasi ini bisa saja tinggi ataupun rendah"></i>
        </th>
      </tr>
    </tbody>
  </table>
  </div>
</div>
<div class="card">
  <div class="card-body px-5">
    <h6 class="text-center">Berdasarkan perhitungan dari ketiga tabel periode tersebut, peramalan yang dianjurkan untuk digunakan adalah </h6>
    <h5 class="bg-primary text-center text-white font-bold py-1">{{ $recomendation }}</h5>
    <p>MAPE atau sering disebut rata-rata kesalahan absolut pada dasarnya menghitung kesalahan dalam bentuk persentase kesalahan hasil prediksi terhadap permintaan aktual selama rentang waktu tertentu yang dimana persentasi ini bisa saja tinggi ataupun rendah</p>
    <p>Secara matematis MAPE dinyatakan sebagai berikut: <br>
			MAPE = |(At - Ft)/At| x 100% <br>
	    Dan untuk rata-rata MAPE dapat dirumuskan sebagai berikut:
    </p>
    <img src="{{ asset('assets/rumus.jpeg') }}" alt="Rumus">
    <p>
      Keterangan: <br>
      MAPE = Kesalahan persentase kesalahan absolut <br>
      At = Permintaan aktual pada periode -t <br>
      Ft = Peramalan permintaan pada periode -t <br>
      n = Jumlah periode peramalan yang terlibat
    </p>
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


