@props(['action'])

<button type="button" class="btn btn-{{ $action->color }} note-btn mr-2" data-toggle="modal" data-target="#{{ $action->id }}">
  <i class="{{ $action->icon }}"></i>
  {{ $action->text }}
</button>



