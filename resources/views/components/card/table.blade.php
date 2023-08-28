@props(['id', 'title', 'columns', 'create-button-type', 'create-route', 'modal-title', 'no-actions-field' => false])

<div class="card">
  <div class="card-header">
    <h4 class="card-title" style="min-height: unset">{{ $title ?? '' }}</h4>
    @isset($createButtonType)
      <x-button.create :$id :type="$createButtonType" :route="$createRoute" />
    @endisset

    {{ $actions ?? '' }}
  </div>
  <div class="card-body">
    <x-table.datatable :$id :$columns :no-actions="$noActionsField ?? false">
      {{ $slot }}
    </x-table.datatable>
  </div>

  <div class="card-footer">
    {{ $cardFooter ?? '' }}
  </div>
</div>

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
