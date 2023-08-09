@props(['route'])

<form class="d-inline" action="{{ $route }}" method="POST">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>
