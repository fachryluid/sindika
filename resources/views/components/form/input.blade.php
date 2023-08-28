@props(['type' => 'text', 'placeholder', 'name', 'value' => '', 'label', 'optional' => false, 'readonly' => false, 'disabled' => false, 'id' => ''])

<div class="form-group">
  @isset($label)
    <label for="{{ $id }}">{{ $label }}</label>
  @endisset

  @if ($type === 'select')
    <select class="form-control" id="{{ $id }}" name="{{ $name }}" {{ !$optional ? 'required' : '' }}
      {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }} {{ $attributes }}>
      @isset($placeholder)
        <option value="" hidden>{{ $placeholder }}</option>
      @endisset
      {{ $slot }}
    </select>
  @else
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
      value="{{ $value }}" placeholder="{{ $placeholder ?? '' }}" {{ !$optional ? 'required' : '' }}
      {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }} {{ $attributes }}>
  @endif
</div>
