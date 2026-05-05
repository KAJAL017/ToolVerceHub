@verbatim
<!-- HEADER -->
<header id="hdr">
  <div class="wrap">
    <div class="hdr-row">
@endverbatim
      <a href="/" class="logo" aria-label="{{ $websiteName }}">
        @if($logoUrl)
          <img src="{{ $logoUrl }}" alt="{{ $websiteName }}" style="height:32px;width:auto">
        @else
          <div class="logo-mark">🌿</div>
          @php
            // Split website name to style middle word
            $words = explode(' ', $websiteName);
            if(count($words) === 3) {
              echo htmlspecialchars($words[0]) . ' <em>' . htmlspecialchars($words[1]) . '</em> ' . htmlspecialchars($words[2]);
            } else {
              echo htmlspecialchars($websiteName);
            }
          @endphp
        @endif
      </a>
@verbatim
      <nav class="nav" aria-label="Primary">
@endverbatim
        <a href="{{ route('home') }}" class="nav-a {{ request()->routeIs('home') ? 'on' : '' }}">Home</a>
        <a href="{{ route('tools') }}" class="nav-a {{ request()->routeIs('tools') ? 'on' : '' }}">Tools</a>
@verbatim
        <div class="dd-w">
          <span class="nav-a" tabindex="0" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret">▾</span></span>
          <div class="dd" role="menu">
@endverbatim
            @forelse($headerCategories as $category)
            <a href="{{ route('tools', ['category' => $category->slug]) }}" class="dd-item" role="menuitem">
              <div class="dd-ico d{{ $category->color }}">{{ $category->icon ?? '📁' }}</div>
              <div>
                <div class="dd-nm">{{ $category->name }}</div>
                <div class="dd-sm">{{ $category->description ?? 'Explore tools' }}</div>
              </div>
            </a>
            @empty
            <a href="{{ route('tools') }}" class="dd-item" role="menuitem">
              <div class="dd-ico dg">📁</div>
              <div>
                <div class="dd-nm">All Categories</div>
                <div class="dd-sm">View all tools</div>
              </div>
            </a>
            @endforelse
@verbatim
          </div>
        </div>
@endverbatim
        <a href="{{ route('blog') }}" class="nav-a {{ request()->routeIs('blog*') ? 'on' : '' }}">Blog</a>
        <a href="{{ route('faq') }}" class="nav-a {{ request()->routeIs('faq') ? 'on' : '' }}">FAQ</a>
        <a href="{{ route('contact') }}" class="nav-a {{ request()->routeIs('contact') ? 'on' : '' }}">Contact</a>
@verbatim
      </nav>
      <div class="hdr-cta">
@endverbatim
        <a href="{{ route('tools', ['free' => 'true']) }}" class="btn btn-g btn-sm">🚀 Try Free Tools</a>
@verbatim
      </div>
      <button class="hbg" id="hbg" aria-label="Open menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>
@endverbatim
