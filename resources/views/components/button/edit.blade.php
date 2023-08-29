@props(['route', 'size', 'class' => ''])

<x-button type="link" :$route color="primary" :class="(isset($size) ? 'btn-' . $size : '') . ' ' . $class" data-toggle="tooltip" title="Edit">
  <i class="fas fa-pencil-alt"></i>
  {{ $slot }}
</x-button>
