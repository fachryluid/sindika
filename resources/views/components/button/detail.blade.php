@props(['route', 'size'])

<x-button.index type="link" :$route color="success" :class="isset($size) ? 'btn-' . $size : ''">Detail</x-button.index>
