@props(['loop', 'edit-route', 'detail-route', 'delete-route'])

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
        <x-button.delete :route="$deleteRoute" size="sm" />
      @endisset
    </td>
  @endif
</tr>
