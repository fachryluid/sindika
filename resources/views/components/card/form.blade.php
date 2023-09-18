@props(['action', 'title' => '', 'send-files' => false, 'method' => 'POST'])

<x-card :$title>
  @isset($cardHeader)
    <x-slot:card-header>
      {{ $cardHeader }}
    </x-slot:card-header>
  @endisset

  <x-form action="{{ $action ?? '' }}" :$method :send-files="$sendFiles ?? null">
    {{ $slot }}

    <div class="text-right">
      <x-button type="submit">Simpan</x-button>
    </div>
  </x-form>
</x-card>
