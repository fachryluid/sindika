@props(['id', 'route', 'size', 'class' => '', 'type' => 'link', 'modal-title' => 'Edit data'])

@if ($type === 'link')
  <x-button type="link" :$route color="primary" :class="(isset($size) ? 'btn-' . $size : '') . ' ' . $class" data-toggle="tooltip" title="Edit">
    <i class="fas fa-pencil-alt"></i>
    {{ $slot }}
  </x-button>
@elseif ($type === 'modal')
  <x-modal.trigger :$id :$size :$class color="primary">
    <i class="fas fa-pencil-alt"></i>
    {{ $slot }}
  </x-modal.trigger>

  <x-modal :$id :title="$modalTitle" no-footer>
    <x-form action="{{ $route }}" method="PUT">
      {{ $editForm ?? '' }}

      <div class="text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </x-form>
  </x-modal>
@endif
