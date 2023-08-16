@props(['id'])

<x-button.index class="note-btn mr-2" data-toggle="modal" data-target="#modal-{{ $id }}">
  {{ $slot }}
</x-button.index>
