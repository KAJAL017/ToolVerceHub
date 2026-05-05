@extends('website.layouts.app')

@section('title', \App\Models\Setting::where('key', 'about_page_title')->value('value') ?? 'About Us — ToolVerse Hub')
@section('description', 'Learn about ToolVerse Hub - Your one-stop destination for 130+ free tools and 500+ HTML5 games. Discover our mission, vision, and the team behind the platform.')

@section('content')

<!-- Include Styles -->
@include('website.partials.styles')

<style>
/* About Us Page Responsive Styles */

/* Prevent horizontal scroll */
html, body {
  overflow-x: hidden !important;
  width: 100% !important;
  max-width: 100vw !important;
}

* {
  max-width: 100% !important;
  box-sizing: border-box !important;
}

.wrap {
  width: 100% !important;
  max-width: 1180px !important;
  overflow: hidden !important;
}

/* Tablet Responsive */
@media (max-width: 1024px) {
  div[style*="grid-template-columns:repeat(4,1fr)"] {
    grid-template-columns: repeat(2, 1fr) !important;
  }
  
  div[style*="grid-template-columns:repeat(3,1fr)"] {
    grid-template-columns: repeat(2, 1fr) !important;
  }
}

/* Mobile Responsive */
@media (max-width: 768px) {
  section[style*="padding:128px"] {
    padding: 80px 0 40px !important;
  }
  
  section[style*="padding:0 0 88px"] {
    padding: 0 0 60px !important;
  }
  
  section[style*="padding:88px 0"] {
    padding: 60px 0 !important;
  }
  
  section[style*="padding:64px 0"] {
    padding: 48px 0 !important;
  }
  
  div[style*="grid-template-columns:repeat(2,1fr)"],
  div[style*="grid-template-columns:repeat(3,1fr)"],
  div[style*="grid-template-columns:repeat(4,1fr)"] {
    grid-template-columns: 1fr !important;
  }
  
  div[style*="padding:72px 52px"] {
    padding: 48px 32px !important;
  }
  
  div[style*="padding:48px"] {
    padding: 32px !important;
  }
  
  div[style*="padding:42px"] {
    padding: 28px !important;
  }
  
  div[style*="padding:32px"] {
    padding: 24px !important;
  }
  
  div[style*="margin-bottom:64px"] {
    margin-bottom: 48px !important;
  }
  
  div[style*="margin-bottom:54px"] {
    margin-bottom: 40px !important;
  }
  
  .h1 {
    font-size: 2rem !important;
    line-height: 1.2 !important;
  }
  
  .h2 {
    font-size: 1.6rem !important;
  }
  
  .h3 {
    font-size: 1.2rem !important;
  }
  
  .body-lg {
    font-size: 1rem !important;
  }
  
  .wrap {
    padding: 0 20px !important;
  }
  
  .btn {
    font-size: 0.9rem !important;
    padding: 12px 20px !important;
  }
  
  .btn-lg {
    font-size: 1rem !important;
    padding: 14px 24px !important;
  }
  
  .btn-sm {
    font-size: 0.8rem !important;
    padding: 9px 16px !important;
  }
  
  div[style*="width:64px;height:64px"] {
    width: 56px !important;
    height: 56px !important;
    font-size: 1.75rem !important;
  }
  
  div[style*="width:72px;height:72px"] {
    width: 60px !important;
    height: 60px !important;
    font-size: 2.2rem !important;
  }
  
  div[style*="font-size:3.5rem"] {
    font-size: 2.8rem !important;
  }
  
  div[style*="display:flex;gap:12px"] {
    gap: 10px !important;
  }
  
  div[style*="gap:24px"] {
    gap: 20px !important;
  }
  
  div[style*="gap:32px"] {
    gap: 24px !important;
  }
}

@media (max-width: 480px) {
  section[style*="padding:128px"],
  section[style*="padding:80px"] {
    padding: 60px 0 30px !important;
  }
  
  section[style*="padding:0 0 88px"],
  section[style*="padding:0 0 60px"] {
    padding: 0 0 40px !important;
  }
  
  section[style*="padding:88px 0"],
  section[style*="padding:60px 0"] {
    padding: 48px 0 !important;
  }
  
  section[style*="padding:64px 0"],
  section[style*="padding:48px 0"] {
    padding: 40px 0 !important;
  }
  
  div[style*="padding:72px 52px"],
  div[style*="padding:48px 32px"] {
    padding: 32px 20px !important;
  }
  
  div[style*="padding:48px"],
  div[style*="padding:32px"] {
    padding: 24px !important;
  }
  
  div[style*="padding:42px"],
  div[style*="padding:28px"] {
    padding: 20px !important;
  }
  
  div[style*="padding:32px"],
  div[style*="padding:24px"] {
    padding: 18px !important;
  }
  
  div[style*="margin-bottom:64px"],
  div[style*="margin-bottom:48px"] {
    margin-bottom: 36px !important;
  }
  
  div[style*="margin-bottom:54px"],
  div[style*="margin-bottom:40px"] {
    margin-bottom: 32px !important;
  }
  
  div[style*="margin-bottom:24px"] {
    margin-bottom: 18px !important;
  }
  
  .h1 {
    font-size: 1.75rem !important;
  }
  
  .h2 {
    font-size: 1.4rem !important;
  }
  
  .h3,
  h3[style*="margin-bottom:8px"] {
    font-size: 1.1rem !important;
  }
  
  h4[style*="font-size:1.05rem"] {
    font-size: 0.95rem !important;
  }
  
  .wrap {
    padding: 0 16px !important;
  }
  
  .btn {
    font-size: 0.85rem !important;
    padding: 11px 18px !important;
  }
  
  .btn-lg {
    font-size: 0.95rem !important;
    padding: 13px 22px !important;
  }
  
  .btn-sm {
    font-size: 0.75rem !important;
    padding: 8px 14px !important;
  }
  
  div[style*="width:64px;height:64px"],
  div[style*="width:56px;height:56px"] {
    width: 48px !important;
    height: 48px !important;
    font-size: 1.5rem !important;
  }
  
  div[style*="width:72px;height:72px"],
  div[style*="width:60px;height:60px"] {
    width: 52px !important;
    height: 52px !important;
    font-size: 1.9rem !important;
  }
  
  div[style*="font-size:3.5rem"],
  div[style*="font-size:2.8rem"] {
    font-size: 2.4rem !important;
  }
  
  div[style*="font-size:2.5rem"] {
    font-size: 2rem !important;
  }
  
  div[style*="font-size:2rem"] {
    font-size: 1.75rem !important;
  }
  
  p[style*="font-size:1rem"] {
    font-size: 0.9rem !important;
  }
  
  p[style*="font-size:.875rem"] {
    font-size: 0.8rem !important;
  }
  
  div[style*="font-size:.82rem"] {
    font-size: 0.75rem !important;
  }
  
  div[style*="font-size:.7rem"] {
    font-size: 0.65rem !important;
  }
  
  div[style*="display:flex;gap:12px"],
  div[style*="display:flex;gap:10px"] {
    gap: 8px !important;
    flex-direction: column !important;
  }
  
  div[style*="gap:24px"],
  div[style*="gap:20px"] {
    gap: 16px !important;
  }
  
  div[style*="gap:32px"],
  div[style*="gap:24px"] {
    gap: 18px !important;
  }
}

/* Flex buttons responsive */
@media (max-width: 480px) {
  div[style*="display:flex;gap:12px;justify-content:center"] a {
    width: 100% !important;
    justify-content: center !important;
  }
}
</style>

@verbatim
<!-- ABOUT HERO -->
<section style="padding:128px 0 64px;background:var(--bg)">
  <div class="wrap">
    <div style="text-align:center;max-width:740px;margin:0 auto">
      <div class="eyebrow" style="justify-content:center">About Us</div>
      <h1 class="h1" style="margin-bottom:18px">Empowering Digital Creativity,<br><span style="color:var(--g)">One Tool at a Time</span></h1>
      <p class="body-lg">
        ToolVerse Hub is your all-in-one platform for free digital tools and entertainment. We believe powerful tools should be accessible to everyone, without barriers or subscriptions.
      </p>
    </div>
  </div>
</section>

<!-- MISSION & VISION -->
<section style="background:var(--bg);padding:0 0 88px">
  <div class="wrap">
    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:24px;margin-bottom:64px">
      
      <!-- Mission Card -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:42px;box-shadow:var(--s1)">
        <div style="width:64px;height:64px;border-radius:16px;background:var(--gl);display:flex;align-items:center;justify-content:center;font-size:2rem;margin-bottom:24px">
          🎯
        </div>
        <h2 class="h2" style="margin-bottom:16px">Our Mission</h2>
        <p style="font-size:1rem;color:var(--mid);line-height:1.75">
          To democratize access to professional-grade digital tools by providing a free, user-friendly platform that empowers creators, professionals, and enthusiasts worldwide to achieve their goals without financial barriers.
        </p>
      </div>
      
      <!-- Vision Card -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:42px;box-shadow:var(--s1)">
        <div style="width:64px;height:64px;border-radius:16px;background:var(--bl);display:flex;align-items:center;justify-content:center;font-size:2rem;margin-bottom:24px">
          🚀
        </div>
        <h2 class="h2" style="margin-bottom:16px">Our Vision</h2>
        <p style="font-size:1rem;color:var(--mid);line-height:1.75">
          To become the world's most trusted and comprehensive hub for free digital tools and entertainment, fostering a global community where creativity and productivity thrive without limitations.
        </p>
      </div>
      
    </div>
    
    <!-- Story Section -->
    <div style="max-width:1080px;margin:0 auto">
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:48px;box-shadow:var(--s1)">
        <h2 class="h2" style="margin-bottom:24px;text-align:center">Our Story</h2>
        
        <div style="max-width:840px;margin:0 auto">
          <p style="font-size:1rem;color:var(--mid);line-height:1.8;margin-bottom:20px">
            ToolVerse Hub was born from a simple observation: powerful digital tools were either expensive, complicated, or required lengthy sign-ups. We believed there had to be a better way.
          </p>
          
          <p style="font-size:1rem;color:var(--mid);line-height:1.8;margin-bottom:20px">
            In 2024, we launched with a vision to create a platform where anyone could access professional-grade tools instantly, without barriers. What started as a collection of image converters has grown into a comprehensive ecosystem of 130+ tools and 500+ games.
          </p>
          
          <p style="font-size:1rem;color:var(--mid);line-height:1.8;margin-bottom:20px">
            Today, ToolVerse Hub serves thousands of users daily — from students working on projects, to professionals optimizing workflows, to gamers seeking entertainment. Every tool is free, every feature is accessible, and every user matters.
          </p>
          
          <p style="font-size:1rem;color:var(--mid);line-height:1.8">
            We're not just building tools; we're building a community where creativity and productivity flourish without financial constraints.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
@endverbatim

<!-- WHAT WE OFFER -->
<section style="background:var(--bg2);padding:88px 0">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:54px">
      <div class="eyebrow" style="justify-content:center">What We Offer</div>
      <h2 class="h2">Featured Tool Categories,<br>Infinite Possibilities</h2>
    </div>
    
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px">
      
      @forelse($featuredCategories as $category)
      <!-- {{ $category->name }} -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:32px;box-shadow:var(--s1);text-align:center">
        <div style="width:72px;height:72px;border-radius:16px;background:
          @if($category->color == 'g') var(--gl)
          @elseif($category->color == 'c') var(--cl)
          @elseif($category->color == 'b') var(--bl)
          @elseif($category->color == 'a') var(--al)
          @else var(--gl)
          @endif
        ;display:flex;align-items:center;justify-content:center;font-size:2.5rem;margin:0 auto 20px">
          {{ $category->icon ?? '🔧' }}
        </div>
        <h3 class="h3" style="margin-bottom:8px">{{ $category->name }}</h3>
        <div style="font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:
          @if($category->color == 'g') var(--g)
          @elseif($category->color == 'c') var(--c)
          @elseif($category->color == 'b') var(--b)
          @elseif($category->color == 'a') var(--a)
          @else var(--g)
          @endif
        ;margin-bottom:12px">{{ $category->tools_count }} TOOLS</div>
        <p style="font-size:.875rem;color:var(--mid);line-height:1.7;margin-bottom:16px">
          {{ $category->description ?? 'Explore our collection of professional tools.' }}
        </p>
        <a href="{{ route('tools', ['category' => $category->slug]) }}" class="btn 
          @if($category->color == 'g') btn-g
          @elseif($category->color == 'c') btn-c
          @elseif($category->color == 'b') btn-b
          @else btn-g
          @endif
        btn-sm">Explore Tools →</a>
      </div>
      @empty
      <!-- Fallback: IMGConvertPro -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:32px;box-shadow:var(--s1);text-align:center">
        <div style="width:72px;height:72px;border-radius:16px;background:var(--gl);display:flex;align-items:center;justify-content:center;font-size:2.5rem;margin:0 auto 20px">
          🖼️
        </div>
        <h3 class="h3" style="margin-bottom:8px">Image Tools</h3>
        <div style="font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--g);margin-bottom:12px">IMAGE TOOLS</div>
        <p style="font-size:.875rem;color:var(--mid);line-height:1.7;margin-bottom:16px">
          Professional image tools for conversion, compression, resizing, and editing.
        </p>
        <a href="{{ route('tools') }}" class="btn btn-g btn-sm">Explore Tools →</a>
      </div>
      
      <!-- Fallback: SmartPDFs -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:32px;box-shadow:var(--s1);text-align:center">
        <div style="width:72px;height:72px;border-radius:16px;background:var(--cl);display:flex;align-items:center;justify-content:center;font-size:2.5rem;margin:0 auto 20px">
          📄
        </div>
        <h3 class="h3" style="margin-bottom:8px">PDF Tools</h3>
        <div style="font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--c);margin-bottom:12px">PDF TOOLS</div>
        <p style="font-size:.875rem;color:var(--mid);line-height:1.7;margin-bottom:16px">
          PDF tools for merging, splitting, compressing, and converting documents.
        </p>
        <a href="{{ route('tools') }}" class="btn btn-c btn-sm">Explore Tools →</a>
      </div>
      
      <!-- Fallback: More Tools -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:32px;box-shadow:var(--s1);text-align:center">
        <div style="width:72px;height:72px;border-radius:16px;background:var(--bl);display:flex;align-items:center;justify-content:center;font-size:2.5rem;margin:0 auto 20px">
          🎮
        </div>
        <h3 class="h3" style="margin-bottom:8px">More Tools</h3>
        <div style="font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--b);margin-bottom:12px">ALL TOOLS</div>
        <p style="font-size:.875rem;color:var(--mid);line-height:1.7;margin-bottom:16px">
          Discover all our free tools and features for your daily tasks.
        </p>
        <a href="{{ route('tools') }}" class="btn btn-b btn-sm">Explore Tools →</a>
      </div>
      @endforelse
      
    </div>
  </div>
</section>

@verbatim
<!-- WHY CHOOSE US -->
<section style="background:var(--bg);padding:88px 0">
  <div class="wrap">
    <div style="text-align:center;margin-bottom:54px">
      <div class="eyebrow" style="justify-content:center">Why Choose Us</div>
      <h2 class="h2">Built for You, Powered by Passion</h2>
    </div>
    
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:24px">
      
      <div style="text-align:center">
        <div style="width:64px;height:64px;border-radius:50%;background:var(--gl);display:flex;align-items:center;justify-content:center;font-size:1.8rem;margin:0 auto 16px">
          🆓
        </div>
        <h4 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">100% Free</h4>
        <p style="font-size:.875rem;color:var(--mid);line-height:1.65">
          No hidden costs, no subscriptions, no paywalls. Everything is free forever.
        </p>
      </div>
      
      <div style="text-align:center">
        <div style="width:64px;height:64px;border-radius:50%;background:var(--cl);display:flex;align-items:center;justify-content:center;font-size:1.8rem;margin:0 auto 16px">
          ⚡
        </div>
        <h4 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Instant Access</h4>
        <p style="font-size:.875rem;color:var(--mid);line-height:1.65">
          No signup required. Start using tools immediately in your browser.
        </p>
      </div>
      
      <div style="text-align:center">
        <div style="width:64px;height:64px;border-radius:50%;background:var(--bl);display:flex;align-items:center;justify-content:center;font-size:1.8rem;margin:0 auto 16px">
          🔒
        </div>
        <h4 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Privacy First</h4>
        <p style="font-size:.875rem;color:var(--mid);line-height:1.65">
          Your files are processed locally. We don't store or share your data.
        </p>
      </div>
      
      <div style="text-align:center">
        <div style="width:64px;height:64px;border-radius:50%;background:var(--al);display:flex;align-items:center;justify-content:center;font-size:1.8rem;margin:0 auto 16px">
          📱
        </div>
        <h4 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Works Everywhere</h4>
        <p style="font-size:.875rem;color:var(--mid);line-height:1.65">
          Desktop, tablet, or mobile — our tools work on any device, any browser.
        </p>
      </div>
      
    </div>
  </div>
</section>

@endverbatim

<!-- CTA -->
<section style="background:var(--bg2);padding:88px 0">
  <div class="wrap">
    <div style="background:#1C2820;border-radius:24px;padding:72px 52px;text-align:center;position:relative;overflow:hidden">
      <div class="eyebrow" style="color:#6ECB8F;justify-content:center">Join Our Community</div>
      <h2 class="h2" style="color:#F5F2E8;margin-bottom:12px">Ready to Get Started?</h2>
      <p class="body-lg" style="color:rgba(245,242,232,.45);margin-bottom:34px">
        Join thousands of users who trust ToolVerse Hub for their daily tasks and entertainment.
      </p>
      <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
        <a href="{{ route('tools') }}" class="btn btn-g btn-lg">🚀 Start Using Tools</a>
        <a href="{{ route('blog') }}" class="btn btn-out btn-lg" style="color:#F5F2E8;border-color:rgba(255,255,255,.2)">📚 Read Our Blog</a>
      </div>
    </div>
  </div>
</section>

<!-- Include Scripts -->
@include('website.partials.scripts')

@endsection
