@props(['id', 'route', 'class' => '', 'size' => null, 'confirm' => 'Data terkait akan dihapus, apakah Anda ingin melanjutkan?', 'no-delete-confirm'])

<x-modal.trigger :$id color="danger" :$size :$class>
  <i class="fas fa-trash"></i>
  {{ $slot }}
</x-modal.trigger>

<x-modal :$id :title="$confirm" no-footer>
  <x-form action="{{ $route }}" method="DELETE">
    @if (!isset($noDeleteConfirm) || !$noDeleteConfirm)
      <x-form.input :id="'password-' . $id" type="password" name="password" label="Password Anda"
        placeholder="Masukkan password untuk konfirmasi" required />
    @endif

    <div class="d-flex justify-content-end" style="gap: 8px">
      <x-modal.close color="secondary">
        <i class="fa fa-times"></i>
        Batal
      </x-modal.close>
      <x-button type="submit" color="danger">
        <i class="fa fa-trash"></i>
        Ya, Hapus
      </x-button>
    </div>
  </x-form>
</x-modal>
