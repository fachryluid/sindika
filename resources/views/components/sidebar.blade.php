@props(['links' => []])

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper" class="pb-5">
    <div class="sidebar-brand">
      <a href="index.html">Sindika</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
          <li class=active><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
        </ul>
      </li>

      @foreach ($links as $header => $children)
        <li class="menu-header">{{ $header }}</li>
        @foreach ($children as $child)
          <li>
            <a class="nav-link" href="{{ $child['url'] ? $child['url'] : '#' }}">
              <i class="{{ $child['icon'] ? $child['icon'] : 'far fa-square' }}"></i>
              <span>{{ $child['name'] }}</span>
            </a>
          </li>
        @endforeach
      @endforeach
    </ul>
  </aside>
</div>
