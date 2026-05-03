@extends('website.layouts.app')

@section('title', 'Blog — Free Tool Guides, PDF Tips & Gaming News | ToolVerse Hub')
@section('description', 'Expert guides on image conversion, PDF editing, and free HTML5 games. Tutorials, how-to articles, and walkthroughs.')

@section('content')

<!-- Include Styles -->
@include('website.partials.styles')

<!-- BLOG HERO -->
<section style="padding:128px 0 64px;background:var(--bg)">
  <div class="wrap">
    <div style="text-align:center;max-width:640px;margin:0 auto">
      <div class="eyebrow" style="justify-content:center">Our Blog</div>
      <h1 class="h1" style="margin-bottom:18px">Guides, Tips & Tutorials</h1>
      <p class="body-lg">
        Learn how to get the most out of our tools with expert guides, step-by-step tutorials, and productivity tips.
      </p>
    </div>
  </div>
</section>

<!-- BLOG GRID -->
<section style="background:var(--bg);padding:0 0 88px">
  <div class="wrap">
    
    @if($blogs->count() > 0)
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px">
      
      @foreach($blogs as $blog)
      <!-- Blog Post Card -->
      <article style="background:#fff;border:1.5px solid var(--bdr);border-radius:20px;overflow:hidden;box-shadow:var(--s1);transition:all .26s">
        <a href="{{ route('blog.post', $blog->slug) }}" style="display:block">
          <div style="height:180px;background:linear-gradient(135deg,
            @if($blog->category_color == 'g') var(--gl),var(--al)
            @elseif($blog->category_color == 'c') var(--cl),var(--al)
            @elseif($blog->category_color == 'b') var(--bl),var(--cl)
            @else var(--al),var(--gl)
            @endif
          );display:flex;align-items:center;justify-content:center;font-size:3.5rem">
            {{ $blog->featured_image_emoji ?? '📄' }}
          </div>
        </a>
        <div style="padding:24px">
          <div style="display:flex;align-items:center;gap:8px;font-size:.71rem;color:var(--mist);font-weight:600;margin-bottom:9px">
            <span style="font-size:.67rem;font-weight:800;text-transform:uppercase;color:
              @if($blog->category_color == 'g') var(--g)
              @elseif($blog->category_color == 'c') var(--c)
              @elseif($blog->category_color == 'b') var(--b)
              @else var(--a)
              @endif
            ">{{ $blog->category->name ?? 'ARTICLE' }}</span>
            <span>•</span>
            <span>{{ $blog->read_time }} min read</span>
          </div>
          <h3 class="h3" style="margin-bottom:10px">
            <a href="{{ route('blog.post', $blog->slug) }}" style="color:var(--ink)">{{ $blog->title }}</a>
          </h3>
          <p style="font-size:.84rem;color:var(--mid);line-height:1.65;margin-bottom:15px">
            {{ $blog->tldr_summary ? strip_tags(Str::limit($blog->tldr_summary, 120)) : Str::limit(strip_tags($blog->content), 120) }}
          </p>
          <div style="display:flex;align-items:center;justify-content:space-between;padding-top:12px;border-top:1px solid var(--bg2)">
            <span style="font-size:.71rem;color:var(--mist);font-weight:600">{{ $blog->published_date->format('M d, Y') }}</span>
            <a href="{{ route('blog.post', $blog->slug) }}" style="font-size:.8rem;font-weight:700;color:
              @if($blog->category_color == 'g') var(--g)
              @elseif($blog->category_color == 'c') var(--c)
              @elseif($blog->category_color == 'b') var(--b)
              @else var(--a)
              @endif
            ;display:flex;align-items:center;gap:4px">
              Read More →
            </a>
          </div>
        </div>
      </article>
      @endforeach
      
    </div>
    
    <!-- Pagination -->
    @if($blogs->hasPages())
    <div style="margin-top:48px;display:flex;justify-content:center;gap:8px">
      @if($blogs->onFirstPage())
        <button class="btn btn-out btn-sm" disabled style="opacity:.5">← Previous</button>
      @else
        <a href="{{ $blogs->previousPageUrl() }}" class="btn btn-out btn-sm">← Previous</a>
      @endif
      
      @foreach($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
        @if($page == $blogs->currentPage())
          <button class="btn btn-g btn-sm">{{ $page }}</button>
        @else
          <a href="{{ $url }}" class="btn btn-out btn-sm">{{ $page }}</a>
        @endif
      @endforeach
      
      @if($blogs->hasMorePages())
        <a href="{{ $blogs->nextPageUrl() }}" class="btn btn-out btn-sm">Next →</a>
      @else
        <button class="btn btn-out btn-sm" disabled style="opacity:.5">Next →</button>
      @endif
    </div>
    @endif
    
    @else
    <!-- No Blogs Found -->
    <div style="text-align:center;padding:60px 20px">
      <div style="font-size:4rem;margin-bottom:20px">📝</div>
      <h3 class="h3" style="margin-bottom:12px">No Blog Posts Yet</h3>
      <p class="body" style="color:var(--mid)">Check back soon for new articles and tutorials!</p>
    </div>
    @endif
    
  </div>
</section>

<!-- NEWSLETTER CTA -->
<section style="background:var(--bg2);padding:88px 0">
  <div class="wrap">
    <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:48px;text-align:center;max-width:640px;margin:0 auto">
      <div style="width:64px;height:64px;background:var(--gl);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:2rem;margin:0 auto 20px">
        📬
      </div>
      <h2 class="h2" style="margin-bottom:12px">Stay Updated</h2>
      <p class="body" style="margin-bottom:28px;max-width:420px;margin-left:auto;margin-right:auto">
        Get the latest tips, tutorials, and tool updates delivered to your inbox every week.
      </p>
      <div style="display:flex;gap:8px;max-width:420px;margin:0 auto">
        <input type="email" placeholder="Enter your email" style="flex:1;padding:11px 18px;border:1.5px solid var(--bdr);border-radius:999px;font-size:.875rem;outline:none">
        <button class="btn btn-g">Subscribe</button>
      </div>
      <p style="font-size:.72rem;color:var(--mist);margin-top:12px">
        No spam. Unsubscribe anytime.
      </p>
    </div>
  </div>
</section>

<!-- Include Scripts -->
@include('website.partials.scripts')

@endsection
