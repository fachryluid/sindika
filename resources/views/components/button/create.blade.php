@props(['id', 'type', 'route'])

@if ($type === 'link')
  <x-button.index type="link" :$route class="note-btn mr-2">
    <i class="fa fa-plus"></i>
    Tambah
  </x-button.index>
@elseif($type === 'modal')
  <x-modal.trigger :$id>
    <i class="fa fa-plus"></i>
    Tambah
  </x-modal.trigger>
@endif
