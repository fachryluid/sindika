@props(['route', 'size'])

<x-button.index type="link" :$route color="primary" :class="isset($size) ? 'btn-' . $size : ''" data-toggle="tooltip" title="Edit">
  <i class="fas fa-pencil-alt"></i>
</x-button.index>
