@props(['links' => []])

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper" class="pb-5">
    <div class="sidebar-brand">
      <a href="index.html">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown active">
        <a href="{{ route('dashboard.index') }}" class="nav-link"><i
            class="fa fa-tachometer-alt"></i><span>Dashboard</span></a>
      </li>

      @foreach ($links as $header => $children)
        <li class="menu-header">{{ $header }}</li>
        @foreach ($children as $name => $child)
          <li>
            <a class="nav-link" href="{{ $child['url'] ? $child['url'] : '#' }}">
              <i class="fa fa-{{ $child['icon'] ? $child['icon'] : 'square' }}"></i>
              <span>{{ $name }}</span>
            </a>
          </li>
        @endforeach
      @endforeach
    </ul>
  </aside>
</div>
