@verbatim
<!-- MOBILE NAV -->
<nav id="mob" role="dialog" aria-modal="true" aria-label="Site navigation">
  <button class="mob-x" id="mob-x" aria-label="Close">✕</button>
@endverbatim
  <a href="{{ route('home') }}" class="mob-a">Home</a>
  <a href="{{ route('tools') }}" class="mob-a">Tools</a>
  <button class="mob-a mob-cat-toggle" id="mob-cat-toggle" style="background:none;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;">
    Categories <span class="mob-caret" style="font-size:0.9rem;transition:transform 0.3s;">▾</span>
  </button>
  <div id="mob-categories" style="display:none;width:100%;max-width:400px;">
    @forelse($headerCategories as $category)
      <a href="{{ route('tools', ['category' => $category->slug]) }}" class="mob-a" style="font-size:1.3rem;padding:8px 40px;background:var(--bg2);margin:4px 0;">
        {{ $category->icon ?? '📁' }} {{ $category->name }}
      </a>
    @empty
      <div class="mob-a" style="font-size:1rem;padding:8px 40px;color:var(--mist);">No categories available</div>
    @endforelse
  </div>
  <a href="{{ route('blog') }}" class="mob-a">Blog</a>
  <a href="{{ route('faq') }}" class="mob-a">FAQ</a>
  <a href="{{ route('contact') }}" class="mob-a">Contact</a>
@verbatim
</nav>

<script>
// Mobile Categories Toggle
document.addEventListener('DOMContentLoaded', function() {
  const catToggle = document.getElementById('mob-cat-toggle');
  const catList = document.getElementById('mob-categories');
  const caret = catToggle?.querySelector('.mob-caret');
  
  if (catToggle && catList) {
    catToggle.addEventListener('click', function(e) {
      e.preventDefault();
      const isOpen = catList.style.display === 'flex';
      
      if (isOpen) {
        catList.style.display = 'none';
        caret.style.transform = 'rotate(0deg)';
      } else {
        catList.style.display = 'flex';
        catList.style.flexDirection = 'column';
        catList.style.gap = '4px';
        caret.style.transform = 'rotate(180deg)';
      }
    });
  }
});
</script>
@endverbatim
