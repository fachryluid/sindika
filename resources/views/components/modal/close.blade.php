@props(['color' => 'secondary'])

<button type="button" {{ $attributes->merge(['class' => "btn btn-$color"]) }}
  data-dismiss="modal">{{ $slot }}</button>
