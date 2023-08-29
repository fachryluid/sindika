@props(['route', 'class' => ''])

<x-button type="link" color="secondary" :$route :$class>
  <i class="fas fa-arrow-left"></i>
  {{ $slot }}
</x-button>
