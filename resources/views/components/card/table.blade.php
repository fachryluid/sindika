@props(['id', 'title' => '', 'columns', 'create-button-type', 'create-route', 'modal-title', 'no-actions-field' => false])

<x-card :$title>
  <x-slot:card-header>
    @isset($createButtonType)
      <x-button.create :$id :type="$createButtonType" :route="$createRoute" />
    @endisset

    {{ $actions ?? '' }}
  </x-slot:card-header>

  <x-table.datatable :$id :$columns :no-actions="$noActionsField ?? false">
    {{ $slot }}
  </x-table.datatable>

  @isset($cardFooter)
    <x-slot:card-footer>
      {{ $cardFooter }}
    </x-slot:card-footer>
  @endisset
</x-card>

@if (isset($createButtonType) && $createButtonType === 'modal')
  <x-modal :$id :title="$modalTitle" no-footer>
    <form action="{{ $createRoute }}" method="POST">
      @csrf
      {{ $createForm ?? '' }}

      <div class="text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </x-modal>
@endif
