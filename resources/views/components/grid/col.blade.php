@props(['width' => 0, 'md'])

<div
  {{ $attributes->merge(['class' => 'col' . ($width > 0 ? "-$width" : '') . (isset($md) && $md > 0 ? " col-md-$md" : '')]) }}>
  {{ $slot }}
</div>
