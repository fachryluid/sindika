@props(['id'])

<button type="submit" class="btn btn-primary note-btn mr-2" data-toggle="modal" data-target="#modal-{{ $id }}">
  {{ $slot }}
</button>
