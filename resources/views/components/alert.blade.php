@props(['type' => 'info'])

<div {{ $attributes->merge(['class' => "alert alert-$type alert-dismissible show fade"]) }}>
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
      <span>&times;</span>
    </button>
    {{ $slot }}
  </div>
</div>
