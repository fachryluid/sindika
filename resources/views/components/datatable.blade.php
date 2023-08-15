@props(['id', 'columns'])

<div class="table-responsive">
  <table class="table table-striped" id="table-{{ $id }}">
    <thead>
      <tr>
        <th class="text-center">#</th>
        @foreach ($columns as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      {{ $slot }}
    </tbody>
  </table>
</div>

@pushonce('css')
  <link rel="stylesheet" href="{{ asset('/css/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/select.bootstrap4.min.css') }}">
@endpushonce

@pushonce('js')
  <script src="{{ asset('/js/datatables.min.js') }}"></script>
  <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
@endpushonce

@push('js')
  <script>
    $("#table-{{ $id }}")
      .dataTable(
        // TODO: passing datatable option from component
        //{
        //  "columnDefs": [{
        //    "sortable": false,
        //    "targets": [2]
        //  }]
        //}
      );
  </script>
@endpush
