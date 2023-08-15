@props(['id', 'columns', 'modal-title', 'input-placeholder'])

<div class="card">
  <div class="card-header">
    <x-create-button :$id />
  </div>
  <div class="card-body">
    <x-datatable :$id :$columns>
      {{ $slot }}
    </x-datatable>
  </div>
</div>

<x-modal :$id :title="$modalTitle" no-footer>
  <form action="{{ route('master.unit.store') }}" method="POST">
    @csrf
    <input type="text" class="form-control mb-3" placeholder="{{ $inputPlaceholder }}">

    <div class="text-right">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</x-modal>
