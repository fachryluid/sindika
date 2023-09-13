@props(['id', 'loop', 'edit-route', 'edit-button-type' => 'link', 'edit-title' => 'Edit data', 'detail-route', 'delete-route', 'delete-confirm' => 'Data terkait akan dihapus, apakah Anda ingin melanjutkan?', 'no-delete-confirm'])

<tr>
  <td class="text-center">{{ $loop->iteration }}</td>
  {{ $slot }}

  @if (isset($detailRoute) || isset($deleteRoute))
    <td>
      @isset($editRoute)
        <x-button.edit :$id :route="$editRoute" size="sm" :type="$editButtonType ?? 'link'" :modal-title="$editTitle ?? 'Edit Data'">
          <x-slot:edit-form>
            {{ $editForm ?? '' }}
          </x-slot:edit-form>
        </x-button.edit>
      @endisset
      @isset($detailRoute)
        <x-button.detail :route="$detailRoute" size="sm" />
      @endisset
      @isset($deleteRoute)
        <x-button.delete :id="'delete-'.$id" :no-delete-confirm="$noDeleteConfirm ?? false" :route="$deleteRoute" size="sm" :confirm="$deleteConfirm ?? 'Data terkait akan dihapus, apakah Anda ingin melanjutkan?'" />
      @endisset
    </td>
  @endif
</tr>
