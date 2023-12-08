@php
  $master = [
    'Master' => [
        'Satuan' => ['url' => route('master.unit.index'), 'icon' => 'square'],
        'Jenis' => ['url' => route('master.type.index'), 'icon' => 'th-large'],
        'Kategori' => ['url' => route('master.category.index'), 'icon' => 'th'],
        'Supplier' => ['url' => route('master.supplier.index'), 'icon' => 'hand-holding-heart'],
        'Obat' => ['url' => route('master.medicine.index'), 'icon' => 'pills'],
        'Stok' => ['url' => route('master.stock.index'), 'icon' => 'boxes'],
        'Penjualan' => ['url' => route('master.sale.index'), 'icon' => 'money-bill'],
    ]
  ];
  $perhitungan = [
    'Perhitungan' => [
      'WMA' => ['url' => route('calculation.wma'), 'icon' => 'square-root-alt'],
      'EOQ' => ['url' => route('calculation.eoq'), 'icon' => 'square-root-alt'],
    ]
  ];
  $links = [];
  if (auth()->user()->role === 'MANAJER') {
    $links = $perhitungan;
  } elseif (auth()->user()->role === 'OPERATOR') {
    $links = $master;
  } else {
    $links = array_merge($master, $perhitungan);
  }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SINDIKA | @yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">

  <!-- CSS Libraries -->
  @stack('css')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-auto">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="https://xsgames.co/randomusers/avatar.php?g=pixel" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in</div>
              <a href="{{ route('profile.index') }}" class="button dropdown-item has-icon">
                <i class="fas fa-user-alt"></i> Profil
              </a>
              <div class="dropdown-divider"></div>
              <a href="javascript:void(0);" onclick="document.getElementById('submitBtn').click();" class="button dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                  <button type="submit" id="submitBtn">Logout</button>
              </form>
            </div>
          </li>
        </ul>
      </nav>

      <x-sidebar :links="$links" />

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>

            <x-breadcrumb :$breadcrumbs />
          </div>

          @if ($errors->any())
            <x-alert type="danger">
              <ul class="m-0 px-3">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </x-alert>
          @endif
          @if (session('success'))
            <x-alert type="success">
              {{ session('success') }}
            </x-alert>
          @endif
          @if (session('warning'))
            <x-alert type="warning">
              {{ session('warning') }}
            </x-alert>
          @endif
          @if (session('info'))
            <x-alert type="info">
              {{ session('info') }}
            </x-alert>
          @endif

          <div class="section-body">
            @yield('main')
          </div>
        </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; Mahasiswa Informatika 2019
        </div>
        <div class="footer-right">
          @yield('footer')
        </div>
      </footer>
    </div>
  </div>

  @stack('modal')

  <!-- General JS Scripts -->
  <script src="{{ asset('/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/popper.js') }}"></script>
  <script src="{{ asset('/js/tooltip.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('/js/moment.min.js') }}"></script>
  <script src="{{ asset('/js/stisla.js') }}"></script>

  <!-- JS Libraries -->
  <!-- Page Specific JS File -->
  @stack('js')

  <!-- Template JS File -->
  <script src="{{ asset('/js/scripts.js') }}"></script>
  <script src="{{ asset('/js/custom.js') }}"></script>
</body>

</html>
