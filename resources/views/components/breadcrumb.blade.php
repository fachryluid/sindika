@props(['breadcrumbs' => []])

<div class="section-header-breadcrumb">
  @foreach ($breadcrumbs as $name => $url)
    {{-- FIXME: Is this safe? --}}
    {{-- !! Is this safe ? --}}
    <div class="breadcrumb-item">{!! $url ? "<a href='$url'>" : '' !!}{{ $name }}{!! $url ? '</a>' : '' !!}</div>
  @endforeach
</div>
