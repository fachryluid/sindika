@props(['id', 'columns', 'actions'])

<div class="card">
  <div class="card-header">
    @foreach ($actions as $action)
      @if ($action->type == 'link')
        <x-create-button :action="$action" />
      @endif
      @if ($action->type == 'modal')
        <x-modal-button :action="$action" />
      @endif
    @endforeach
  </div>
  <div class="card-body">
    <x-datatable :$id :$columns>
      {{ $slot }}
    </x-datatable>
  </div>
</div>
