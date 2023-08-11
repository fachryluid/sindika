@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Perhitungan' => '',
        'EOQ' => '',
    ],
])

@section('title', 'EOQ')

@section('main')
  <div class="alert alert-info" style="font-size: 16px">
    <div class="alert-title" style="font-size: 24px"><i class="fa fa-info-circle"></i> Information</div>
    <p>
      EOQ adalah suatu cara untuk mengelola jumlah stok agar biaya yang dikeluarkan oleh perusahaan bisa seefisien
      mungkin dan tetap terjaga agar persediaan stok tetap stabil. Tujuan metode EOQ ini untuk menentukan jumlah pembelian
      yang optimal, sehingga dapat memperoleh pengendalian persediaan yang juga optimal.
    </p>
  </div>

  <div class="card">
    <div class="card-header pb-0 flex-column align-items-start">
      <h4>Hitung EOQ Per Tahun</h4>
      <p class="mb-0 font-weight-bold text-muted">Pilih obat yang ingin dihitung</p>
    </div>

    <div class="card-body pt-0">
      <form>
        <div class="form-group">
          <div class="input-group">
            <select class="custom-select">
              <option value="" hidden selected>Pilih obat</option>
              @foreach ($medicines as $medicine)
                <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
              @endforeach
            </select>
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary" type="button">Proses</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
