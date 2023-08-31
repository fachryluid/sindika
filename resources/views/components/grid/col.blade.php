@props(['width' => 0, 'sm' => 0, 'md' => 0, 'lg' => 0])

@php
  $class = 'col';
  
  if ($width > 0) {
      $class .= "-$width";
  }
  if ($sm > 0) {
      $class .= " col-sm-$sm";
  }
  if ($md > 0) {
      $class .= " col-md-$md";
  }
  if ($lg > 0) {
      $class .= " col-lg-$lg";
  }
@endphp

<div {{ $attributes->merge(['class' => $class]) }}>
  {{ $slot }}
</div>
