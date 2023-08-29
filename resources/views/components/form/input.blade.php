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
    <input type="file" class="form-control" id="{{ $id }}" name="{{ $name }}" accept="image/*"
      value="{{ $value }}" {{ !$optional ? 'required' : '' }} {{ $attributes }}>
  @elseif($type === 'currency')
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          Rp.
        </div>
      </div>
      <input type="text" class="form-control currency" id="{{ $id }}" name="{{ $name }}"
        value="{{ $value }}" placeholder="{{ $placeholder ?? '' }}" {{ !$optional ? 'required' : '' }}
        {{ $attributes }}>
    </div>
  @else
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
      value="{{ $value }}" placeholder="{{ $placeholder ?? '' }}" {{ !$optional ? 'required' : '' }}
      {{ $attributes }}>
  @endif
</div>

@if ($type === 'currency')
  @pushonce('js')
    <script src="{{ asset('/js/cleave.min.js') }}"></script>
    <script>
      const currencies = document.querySelectorAll('.currency');
      currencies.forEach(currency => {
        new Cleave(currency, {
          numeral: true,
          numeralThousandsGroupStyle: 'thousand'
        });
      });
    </script>
  @endpushonce
@endif
