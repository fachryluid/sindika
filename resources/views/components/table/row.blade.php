@props(['id', 'loop', 'edit-route', 'detail-route', 'delete-route', 'delete-confirm' => 'Data terkait akan dihapus, apakah Anda ingin melanjutkan?'])

<tr>
  <td class="text-center">{{ $loop->iteration }}</td>
  {{ $slot }}

  @if (isset($detailRoute) || isset($deleteRoute))
    <td>
      @isset($editRoute)
        <x-button.edit :route="$editRoute" size="sm" />
      @endisset
      @isset($detailRoute)
        <x-button.detail :route="$detailRoute" size="sm" />
      @endisset
      @isset($deleteRoute)
        <x-button.delete :$id :route="$deleteRoute" size="sm" :confirm="$deleteConfirm ?? 'Data terkait akan dihapus, apakah Anda ingin melanjutkan?'" />
      @endisset
    </td>
  @endif
</tr>
