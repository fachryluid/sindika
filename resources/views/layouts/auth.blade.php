<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
		<title>@yield('title') &mdash; {{ strtoupper(config('app.name')) }}</title>

		<!-- General CSS Files -->
		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">

		<!-- CSS Libraries -->
		<link rel="stylesheet" href="{{ asset('/css/bootstrap-social.css') }}">

		<!-- Template CSS -->
		<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/components.css') }}">

		<style>
			body {
				background-image: url("{{ asset('/img/bg.jpeg') }}");
				background-repeat: no-repeat;
				background-position: center center;
				background-size: cover;
			}
		</style>
	</head>

	<body>
		<div id="app" style="background-color: #ffffffb7;">
			<section class="section">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
							<div class="login-brand" style="margin-bottom: -50px">
								<img src="{{ asset('/assets/logo-type.png') }}" alt="{{ config('app.name') }}" width="300">
								<p class="font-weight-bold" style="font-size: 14px; letter-spacing: 0; color: #4f38dd">
									Sistem Informasi Pengendalian Stok Obat
								</p>
								<div class="rounded-circle mx-auto p-2 shadow" style="background-color: #fff; width: min-content; z-index: 10; position: relative;">
									<img src="{{ asset('/assets/logo-gram.png') }}" alt="{{ config('app.name') }} logo" width="80">
								</div>
							</div>

							<div class="card card-primary">
								<div class="card-header">
									<h4>@yield('title')</h4>
								</div>

								<div class="card-body">
									@if (session('danger'))
										<x-alert type="danger">
											{{ session('danger') }}
										</x-alert>
									@endif
									@yield('form')
								</div>
							</div>
							<div class="simple-footer" style="margin-bottom: 20px">
								Copyright &copy; Mahasiswa Informatika 2019
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<!-- General JS Scripts -->
		<script src="{{ asset('/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/js/popper.js') }}"></script>
		<script src="{{ asset('/js/tooltip.js') }}"></script>
		<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/js/jquery.nicescroll.min.js') }}"></script>
		<script src="{{ asset('/js/moment.min.js') }}"></script>
		<script src="{{ asset('/js/stisla.js') }}"></script>

		<!-- JS Libraies -->
		<!-- Page Specific JS File -->
		@stack('js')

		<!-- Template JS File -->
		<script src="{{ asset('/js/scripts.js') }}"></script>
		<script src="{{ asset('/js/custom.js') }}"></script>
	</body>

</html>
