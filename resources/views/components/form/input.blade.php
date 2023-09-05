@props(['type' => 'text', 'placeholder', 'name', 'value' => '', 'label', 'optional' => false, 'id' => ''])

<div class="form-group">
  @isset($label)
    <label for="{{ $id }}">{{ $label }}</label>
  @endisset

  @switch($type)
    @case('select')
      <select class="form-control @error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}"
        {{ !$optional ? 'required' : '' }} {{ $attributes }}>
        @isset($placeholder)
          <option value="" hidden>{{ $placeholder }}</option>
        @endisset
        {{ $slot }}
      </select>
    @break

    @case('image')
      <input type="file" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}"
        name="{{ $name }}" accept="image/*" {{ !$optional ? 'required' : '' }} {{ $attributes }}>
    @break

    @case('currency')
      @php($currencyClass = 'currency' . time())
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">Rp.</div>
        </div>
        <input type="text" class="form-control {{ $currencyClass }}" id="{{ $id }}"
          name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder ?? '' }}"
          {{ !$optional ? 'required' : '' }} {{ $attributes }}>
      </div>
    @break

    @case('phone')
      @php($phoneClass = 'phone' . time())
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">+62</div>
        </div>
        <input type="text" class="form-control {{ $phoneClass }}" id="{{ $id }}"
          name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder ?? '' }}"
          {{ !$optional ? 'required' : '' }} {{ $attributes }} maxlength="13">
      </div>
    @break

    @default
      <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}"
        name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder ?? '' }}"
        {{ !$optional ? 'required' : '' }} {{ $attributes }}>
  @endswitch

  @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

@if ($type === 'currency' || $type === 'phone')
  @pushonce('js')
    <script src="{{ asset('/js/cleave.min.js') }}"></script>
  @endpushonce
@endif

@if ($type === 'currency')
  @pushonce('js')
    <script>
      const currencies = document.querySelectorAll('.{{ $currencyClass }}');
      currencies.forEach(currency => {
        new Cleave(currency, {
          numeral: true,
          numeralThousandsGroupStyle: 'thousand'
        });
      });
    </script>
  @endpushonce
@endif

@if ($type === 'phone')
  @pushonce('js')
    <!-- FIXME: -->
    {{-- tampaknya yang Indonesia kayak ga ada format --}}
    <script src="{{ asset('/js/cleave-phone.id.js') }}"></script>
    {{-- jadinya saya pake india --}}
    {{-- <script src="{{ asset('/js/cleave-phone.in.js') }}"></script> --}}
    <script>
      const phones = document.querySelectorAll('.{{ $phoneClass }}');
      phones.forEach(phone => {
        phone.addEventListener("keydown", function (event) {
          let inputValue = phone.value;
          const inputValueLength = inputValue.length;
          const keyCode = event.keyCode || event.which;
          inputValue = inputValue.replace(/[^0-9-]/g, '');
          if (keyCode !== 8) {
            if (inputValueLength === 3 || inputValueLength === 8) {
              inputValue = inputValue.slice(0, inputValueLength) + "-" + inputValue.slice(inputValueLength);
            }
          }
          phone.value = inputValue;
        });
      });
    </script>
  @endpushonce
@endif
