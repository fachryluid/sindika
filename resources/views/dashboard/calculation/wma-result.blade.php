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
  <x-card.table id="wma-result-2-periode" :title="$medicine->name" :columns="['Bulan/Tahun', 'Penjualan Aktual', 'Ramalan 2 Periode', 'Error', '[Error]', 'Error^2', '% Error']" :no-actions-field="true">
    <h4 class="text-center text-primary">RAMALAN 2 PERIODE</h4>
    @foreach ($wma2Periode->wmaPeriodeCalc as $wmaPeriodeCalc)
      <x-table.row :$loop>
        <td>{{ $wmaPeriodeCalc->date }}</td>
        <td>{{ $wmaPeriodeCalc->quantitySold }}</td>
        <td>{{ $wmaPeriodeCalc->ft }}</td>
        <td>{{ $wmaPeriodeCalc->error }}</td>
        <td>{{ $wmaPeriodeCalc->absError }}</td>
        <td>{{ $wmaPeriodeCalc->squareError }}</td>
        <td>{{ $wmaPeriodeCalc->percentError }}</td>
      </x-table.row>
      @endforeach
      <tr>
        <td class="text-center">{{ count($wma2Periode->wmaPeriodeCalc)+1 }}</td>
        <td>7/2023</td>
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
  </x-card.table>

  <x-card.table id="wma-result-3-periode" :title="$medicine->name" :columns="['Bulan/Tahun', 'Penjualan Aktual', 'Ramalan 3 Periode', 'Error', '[Error]', 'Error^2', '% Error']" :no-actions-field="true">
    <h4 class="text-center text-primary">RAMALAN 3 PERIODE</h4>
    @foreach ($wma3Periode->wmaPeriodeCalc as $wmaPeriodeCalc)
      <x-table.row :$loop>
        <td>{{ $wmaPeriodeCalc->date }}</td>
        <td>{{ $wmaPeriodeCalc->quantitySold }}</td>
        <td>{{ $wmaPeriodeCalc->ft }}</td>
        <td>{{ $wmaPeriodeCalc->error }}</td>
        <td>{{ $wmaPeriodeCalc->absError }}</td>
        <td>{{ $wmaPeriodeCalc->squareError }}</td>
        <td>{{ $wmaPeriodeCalc->percentError }}</td>
      </x-table.row>
      @endforeach
      <tr>
        <td class="text-center">{{ count($wma3Periode->wmaPeriodeCalc)+1 }}</td>
        <td>7/2023</td>
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
  </x-card.table>

  <x-card.table id="wma-result-4-periode" :title="$medicine->name" :columns="['Bulan/Tahun', 'Penjualan Aktual', 'Ramalan 4 Periode', 'Error', '[Error]', 'Error^2', '% Error']" :no-actions-field="true">
    <h4 class="text-center text-primary">RAMALAN 4 PERIODE</h4>
    @foreach ($wma4Periode->wmaPeriodeCalc as $wmaPeriodeCalc)
      <x-table.row :$loop>
        <td>{{ $wmaPeriodeCalc->date }}</td>
        <td>{{ $wmaPeriodeCalc->quantitySold }}</td>
        <td>{{ $wmaPeriodeCalc->ft }}</td>
        <td>{{ $wmaPeriodeCalc->error }}</td>
        <td>{{ $wmaPeriodeCalc->absError }}</td>
        <td>{{ $wmaPeriodeCalc->squareError }}</td>
        <td>{{ $wmaPeriodeCalc->percentError }}</td>
      </x-table.row>
      @endforeach
      <tr>
        <td class="text-center">{{ count($wma4Periode->wmaPeriodeCalc)+1 }}</td>
        <td>7/2023</td>
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
  </x-card.table>
@endsection
