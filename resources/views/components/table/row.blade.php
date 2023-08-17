@props(['loop', 'detail-route', 'delete-route'])

<tr>
  <td class="text-center">{{ $loop->iteration }}</td>
  {{ $slot }}

  @if (isset($detailRoute) || isset($deleteRoute))
    <td>
      @isset($detailRoute)
        <x-button.detail :route="$detailRoute" size="sm" />
      @endisset
      @isset($deleteRoute)
        <x-button.delete :route="$deleteRoute" size="sm" />
      @endisset
    </td>
  @endif
</tr>
