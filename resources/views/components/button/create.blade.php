@props(['id', 'type', 'route'])

@if ($type === 'link')
  <x-button type="link" :$route class="note-btn mr-2">
    <i class="fa fa-plus"></i>
    {{ $slot }}
  </x-button>
@elseif($type === 'modal')
  <x-modal.trigger :$id class="note-btn mr-2">
    <i class="fa fa-plus"></i>
    {{ $slot }}
  </x-modal.trigger>
@endif
