@props(['route', 'size', 'text'])

<x-form class="d-inline" action="{{ $route }}" method="DELETE">
  <x-button.index type="submit" color="danger" :class="isset($size) ? 'btn-' . $size : ''" data-toggle="tooltip" title="Hapus">
    <i class="fas fa-trash"></i>
    {{ $text ?? '' }}
  </x-button.index>
</x-form>
