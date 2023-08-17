@props(['route', 'size', 'text'])

<x-form class="d-inline" action="{{ $route }}" method="DELETE">
  <x-button.index type="submit" color="danger" :class="isset($size) ? 'btn-' . $size : ''">
    {{ $text ?? 'Hapus' }}
  </x-button.index>
</x-form>
