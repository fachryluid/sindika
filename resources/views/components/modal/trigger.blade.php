@props(['id', 'color' => 'primary', 'size'])

<x-button :$color data-toggle="modal" data-target="#modal-{{ $id }}" role="button"
  {{ $attributes->merge(['class' => isset($size) ? ' btn-' . $size : '']) }}>
  {{ $slot }}
</x-button>
