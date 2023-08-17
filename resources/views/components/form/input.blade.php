@props(['type' => 'text', 'placeholder', 'name', 'value' => '', 'label', 'required' => false, 'readonly' => false, 'disabled' => false, 'id' => ''])

<div class="form-group">
  @isset($label)
    <label for="{{ $id }}">{{ $label }}</label>
  @endisset

  @if ($type === 'select')
    <select class="form-control" id="{{ $id }}" name="{{ $name }}" {{ $required ? 'required' : '' }}
      {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }}>
      {{ $slot }}
    </select>
  @else
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
      value="{{ $value }}" placeholder="{{ $placeholder ?? '' }}" {{ $required ? 'required' : '' }}
      {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }}>
  @endif
</div>
