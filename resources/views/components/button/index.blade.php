@props(['type' => 'button', 'color' => 'primary', 'route'])

@if ($type === 'link')
  <a href="{{ $route }}" {{ $attributes->merge(['class' => 'btn btn-' . $color ?? 'primary']) }} role="button">
    {{ $slot }}
  </a>
@else
  <button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => 'btn btn-' . $color ?? 'primary']) }}>
    {{ $slot }}
  </button>
@endif
