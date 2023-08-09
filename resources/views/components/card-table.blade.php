@props(['id', 'create-route', 'columns'])

<div class="card">
  <div class="card-header">
    <x-create-button :route="$createRoute" />
  </div>
  <div class="card-body">
    <x-datatable :$id :$columns>
      {{ $slot }}
    </x-datatable>
  </div>
</div>
