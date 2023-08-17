@props(['route'])

<x-form class="d-inline" action="{{ $route }}" method="DELETE">
  <x-button.index type="submit" color="danger" class="btn-sm">Hapus</x-button.index>
</x-form>
