@props(['id', 'type', 'route'])

@if ($type === 'link')
  <a href="{{ $route }}" class="btn btn-primary note-btn mr-2">
    <i class="fa fa-plus"></i>
    Tambah
  </a>
@elseif($type === 'modal')
  <x-modal-trigger :$id>
    <i class="fa fa-plus"></i>
    Tambah
  </x-modal-trigger>
@endif
