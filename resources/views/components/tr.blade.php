@props(['loop', 'detail-route', 'delete-route'])

<tr>
  <td class="text-center">{{ $loop->iteration }}</td>
  {{ $slot }}
  <td>
    @if ($detailRoute)
      <x-detail-button :route="$detailRoute" />
    @endif
    @if ($deleteRoute)
      <x-delete-button :route="$deleteRoute" />
    @endif
  </td>
</tr>
