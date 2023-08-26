@props(['route', 'size'])

<x-button type="link" :$route color="success" :class="isset($size) ? 'btn-' . $size : ''" data-toggle="tooltip" title="Detail">
  <i class="fas fa-info-circle"></i>
</x-button>
