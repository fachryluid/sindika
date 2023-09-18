@props(['title', 'inputId', 'medicines' => [], 'action', 'method'])

<div class="card">
  <div class="card-header pb-0 flex-column align-items-start">
    <h4>{{ $title }}</h4>
    <label for="{{ $inputId }}" class="mb-0 font-weight-bold text-muted">Pilih obat yang ingin dihitung</label>
  </div>

  <div class="card-body pt-0">
    <x-form action="{{ $action ?? '' }}" :$method>
      <div class="form-group">
        <div class="input-group">
          <select id="{{ $inputId }}" name="uuid" class="custom-select">
            <option value="" hidden selected>Pilih obat</option>
            @foreach ($medicines as $medicine)
              <option value="{{ $medicine->uuid }}">{{ $medicine->name }}</option>
            @endforeach
          </select>
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary" type="button">Proses</button>
          </div>
        </div>
      </div>
    </x-form>
  </div>
</div>
