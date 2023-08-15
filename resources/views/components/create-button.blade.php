@props(['action'])

<a href="{{ $action->url }}" class="btn btn-{{ $action->color }} note-btn mr-2">
  <i class="{{ $action->icon }}"></i>
  {{ $action->text }}
</a>
