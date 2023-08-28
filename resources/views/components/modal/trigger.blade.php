@props(['id', 'class', 'color' => 'primary', 'size' => ''])

<x-button :class="'note-btn mr-2' . (isset($size) ? ' btn-' . $size : '')" :$color data-toggle="modal" data-target="#modal-{{ $id }}" role="button"
  {{ $attributes }}>
  {{ $slot }}
</x-button>
