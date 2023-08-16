@props(['id'])

<x-button class="note-btn mr-2" data-toggle="modal" data-target="#modal-{{ $id }}">
  {{ $slot }}
</x-button>
