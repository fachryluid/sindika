@props(['id', 'title', 'no-footer' => false])

@push('modal')
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-{{ $id }}"
    aria-labelledby="modal-{{ $id }}-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-{{ $id }}-label">{{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ $slot }}
        </div>

        @unless ($noFooter ?? false)
          <div class="modal-footer bg-whitesmoke br">
            <x-modal.close>Close</x-modal.close>
            {{ $footer ?? '' }}
          </div>
        @endunless
      </div>
    </div>
  </div>
@endpush
