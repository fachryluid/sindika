@props(['type' => 'text', 'placeholder', 'name', 'value' => '', 'label', 'optional' => false, 'id' => ''])

<div class="form-group">
  @isset($label)
    <label for="{{ $id }}">{{ $label }}</label>
  @endisset

  @if ($type === 'select')
    <select class="form-control" id="{{ $id }}" name="{{ $name }}" {{ !$optional ? 'required' : '' }}
      {{ $attributes }}>
      @isset($placeholder)
        <option value="" hidden>{{ $placeholder }}</option>
      @endisset
      {{ $slot }}
    </select>
  @elseif($type === 'image')
    <input type="file" class="form-control" id="{{ $id }}" name="{{ $name }}"
      value="{{ $value }}" {{ !$optional ? 'required' : '' }} {{ $attributes }}>
  @else
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
      value="{{ $value }}" placeholder="{{ $placeholder ?? '' }}" {{ !$optional ? 'required' : '' }}
      {{ $attributes }}>
  @endif
</div>
