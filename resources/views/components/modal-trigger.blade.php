@props(['id'])

<button type="submit" class="btn btn-primary note-btn" data-toggle="modal" data-target="#modal-{{ $id }}">
  {{ $slot }}
</button>
