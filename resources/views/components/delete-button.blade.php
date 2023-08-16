@props(['route'])

<form class="d-inline" action="{{ $route }}" method="POST">
  @csrf
  @method('DELETE')
  <x-button type="submit" color="danger" class="btn-sm">Hapus</x-button>
</form>
