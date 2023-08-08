<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SINDIKA - @yield('title')</title>

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
              <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <x-sidebar :links="[
          'Master Obat' => [
              ['url' => '#', 'icon' => 'square', 'name' => 'Satuan'],
              ['url' => '#', 'icon' => 'th-large', 'name' => 'Jenis'],
              ['url' => '#', 'icon' => 'th', 'name' => 'Kategori'],
              ['url' => '#', 'icon' => 'pills', 'name' => 'Obat'],
              ['url' => '#', 'icon' => 'hand-holding-heart', 'name' => 'Supplier'],
          ],
      
          'Perhitungan' => [
              ['url' => '#', 'icon' => 'square-root-alt', 'name' => 'WMA'],
              ['url' => '#', 'icon' => 'square-root-alt', 'name' => 'EOQ'],
          ],
      
          'Laporan' => [
              ['url' => '#', 'icon' => 'pills', 'name' => 'Obat'],
              ['url' => '#', 'icon' => 'file-alt', 'name' => 'Peramalan'],
              ['url' => '#', 'icon' => 'square-root-alt', 'name' => 'EOQ'],
          ],
      ]" />

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>

            <x-breadcrumb :$breadcrumbs />
          </div>

          @if (session('error'))
            <x-alert type="danger">
              {{ session('error') }}
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
          Copyright &copy; {{ config('app.name') }} {{ date('Y') }}
        </div>
        <div class="footer-right">
          @yield('footer')
        </div>
      </footer>
    </div>
  </div>

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
