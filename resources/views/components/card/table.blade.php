@props(['id', 'columns', 'create-button-type', 'create-route', 'modal-title'])

<div class="card">
  <div class="card-header">
    <x-button.create :$id :type="$createButtonType" :route="$createRoute" />

    {{ $actions ?? '' }}
  </div>
  <div class="card-body">
    <x-table.datatable :$id :$columns>
      {{ $slot }}
    </x-table.datatable>
  </div>
</div>

@if ($createButtonType === 'modal')
  <x-modal.index :$id :title="$modalTitle" no-footer>
    <form action="{{ $createRoute }}" method="POST">
      @csrf
      {{ $createForm ?? '' }}

      <div class="text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </x-modal.index>
@endif
