@props(['title', 'value', 'icon', 'color'])

<div class="card card-statistic-1">
  <div class="card-icon bg-{{ $color }}">
    <i class="fas fa-{{ $icon }}" style="font-size: 28px;"></i>
  </div>
  <div class="card-wrap">
    <div class="card-header">
      <h4>{{ $title }}</h4>
    </div>
    <div class="card-body">
      {{ $value }}
    </div>
  </div>
</div>
