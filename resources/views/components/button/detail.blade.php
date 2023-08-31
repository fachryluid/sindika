@props(['route', 'size', 'class' => ''])

<x-button type="link" :$route color="success" :class="(isset($size) ? 'btn-' . $size : '') . ' ' . $class" data-toggle="tooltip" title="Detail">
  <i class="fas fa-info-circle"></i>
  {{ $slot }}
</x-button>
