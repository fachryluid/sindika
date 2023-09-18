@props(['action' => '', 'method' => 'GET', 'send-files' => false])

<form action="{{ $action }}" method="{{ in_array($method, ['PUT', 'PATCH', 'DELETE']) ? 'POST' : $method }}"
  {{ isset($sendFiles) ? 'enctype=multipart/form-data' : '' }} {{ $attributes }}>
  @if (in_array($method, ['PUT', 'PATCH', 'DELETE']))
    @method($method)
  @endif
  @csrf

  {{ $slot }}
</form>
