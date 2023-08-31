@props(['title'])

<div class="card">
  <div class="card-header" style="min-height: unset">
    <div class="card-title mb-0">
      <h4>{{ $title }}</h4>

      {{ $cardHeader ?? '' }}
    </div>
  </div>
  <div class="card-body">
    {{ $slot }}
  </div>

  @isset($cardFooter)
    <div class="card-footer">
      {{ $cardFooter ?? '' }}
    </div>
  @endisset
</div>
