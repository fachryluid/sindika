@props(['type' => 'info', 'title', 'icon' => 'info-circle'])

<div {{ $attributes->merge(['class' => "alert alert-$type"]) }} style="font-size: 16px">
  <div class="alert-title" style="font-size: 24px"><i class="fa fa-{{ $icon }}"></i> {{ $title }}</div>
  {{ $slot }}
</div>
