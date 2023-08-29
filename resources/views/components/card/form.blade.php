@props(['action', 'title', 'send-files' => false, 'method' => 'POST'])

<div class="card">
  <div class="card-header" style="min-height: unset">
    <div class="card-title mb-0">
      <h4>{{ $title }}</h4>
    </div>
  </div>
  <div class="card-body">
    <x-form action="{{ $action ?? '' }}" :$method :send-files="$sendFiles ?? null">
      {{ $slot }}

      <div class="text-right">
        <x-button type="submit">Simpan</x-button>
      </div>
    </x-form>
  </div>
</div>
