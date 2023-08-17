@props(['loop', 'detail-route', 'delete-route'])

<tr>
  <td class="text-center">{{ $loop->iteration }}</td>
  {{ $slot }}
  <td>
    @if ($detailRoute)
      <x-button.detail :route="$detailRoute" />
    @endif
    @if ($deleteRoute)
      <x-button.delete :route="$deleteRoute" />
    @endif
  </td>
</tr>
