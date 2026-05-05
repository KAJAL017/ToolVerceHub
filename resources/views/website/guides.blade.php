@extends('website.layouts.app')

@section('title', \App\Models\Setting::where('key', 'guides_page_title')->value('value') ?? 'Guides & Tutorials — ToolVerse Hub')
@section('description', 'Learn how to use our tools with step-by-step guides and tutorials. Master image conversion, PDF editing, and more with our comprehensive guides.')

@section('content')

<!-- Include Styles -->
@include('website.partials.styles')

<style>
/* Guides Page Responsive Styles */

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

/* Guide Card Hover Effect */
.guide-card {
  width: 100% !important;
  max-width: 100% !important;
}

.guide-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(0,0,0,.12);
  border-color: var(--g);
}

/* Tablet Responsive */
@media (max-width: 1024px) {
  div[style*="grid-template-columns:repeat(3,1fr)"] {
    grid-template-columns: repeat(2, 1fr) !important;
  }
}

/* Mobile Responsive */
@media (max-width: 768px) {
  section[style*="padding:128px"] {
    padding: 80px 0 40px !important;
  }
  
  section[style*="padding:0 0 48px"] {
    padding: 0 0 32px !important;
  }
  
  section[style*="padding:0 0 88px"] {
    padding: 0 0 60px !important;
  }
  
  section[style*="padding:88px 0"] {
    padding: 60px 0 !important;
  }
  
  div[style*="grid-template-columns:repeat(3,1fr)"],
  div[style*="grid-template-columns:repeat(2,1fr)"] {
    grid-template-columns: 1fr !important;
  }
  
  div[style*="padding:52px"] {
    padding: 32px !important;
  }
  
  div[style*="padding:24px"] {
    padding: 20px !important;
  }
  
  div[style*="margin-bottom:64px"] {
    margin-bottom: 48px !important;
  }
  
  div[style*="margin-bottom:28px"] {
    margin-bottom: 20px !important;
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
  
  div[style*="width:48px;height:48px"] {
    width: 42px !important;
    height: 42px !important;
    font-size: 1.3rem !important;
  }
  
  div[style*="width:72px;height:72px"] {
    width: 60px !important;
    height: 60px !important;
    font-size: 1.75rem !important;
  }
  
  input[style*="padding:16px 52px 16px 20px"] {
    padding: 14px 48px 14px 18px !important;
    font-size: 0.9rem !important;
  }
  
  div[style*="display:flex;align-items:center;gap:12px"] {
    gap: 10px !important;
  }
}

@media (max-width: 480px) {
  section[style*="padding:128px"],
  section[style*="padding:80px"] {
    padding: 60px 0 30px !important;
  }
  
  section[style*="padding:0 0 48px"],
  section[style*="padding:0 0 32px"] {
    padding: 0 0 24px !important;
  }
  
  section[style*="padding:0 0 88px"],
  section[style*="padding:0 0 60px"] {
    padding: 0 0 40px !important;
  }
  
  section[style*="padding:88px 0"],
  section[style*="padding:60px 0"] {
    padding: 48px 0 !important;
  }
  
  div[style*="padding:52px"],
  div[style*="padding:32px"] {
    padding: 24px !important;
  }
  
  div[style*="padding:24px"],
  div[style*="padding:20px"] {
    padding: 16px !important;
  }
  
  div[style*="margin-bottom:64px"],
  div[style*="margin-bottom:48px"] {
    margin-bottom: 36px !important;
  }
  
  div[style*="margin-bottom:28px"],
  div[style*="margin-bottom:20px"] {
    margin-bottom: 16px !important;
  }
  
  div[style*="gap:20px"] {
    gap: 16px !important;
  }
  
  .h1 {
    font-size: 1.75rem !important;
  }
  
  .h2 {
    font-size: 1.4rem !important;
  }
  
  .h3,
  h3[style*="font-size:1.05rem"] {
    font-size: 1rem !important;
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
  
  div[style*="width:48px;height:48px"],
  div[style*="width:42px;height:42px"] {
    width: 36px !important;
    height: 36px !important;
    font-size: 1.2rem !important;
  }
  
  div[style*="width:72px;height:72px"],
  div[style*="width:60px;height:60px"] {
    width: 52px !important;
    height: 52px !important;
    font-size: 1.5rem !important;
  }
  
  input[style*="padding:16px 52px 16px 20px"],
  input[style*="padding:14px 48px 14px 18px"] {
    padding: 12px 44px 12px 16px !important;
    font-size: 0.85rem !important;
  }
  
  i[style*="right:22px"] {
    right: 18px !important;
    font-size: 0.85rem !important;
  }
  
  p[style*="font-size:.875rem"] {
    font-size: 0.8rem !important;
  }
  
  span[style*="font-size:.8rem"] {
    font-size: 0.75rem !important;
  }
  
  div[style*="font-size:2rem"] {
    font-size: 1.75rem !important;
  }
}

/* Search Input Responsive */
input#guideSearch {
  width: 100% !important;
  max-width: 100% !important;
  box-sizing: border-box !important;
}

/* Grid Responsive */
div[style*="display:grid"] {
  width: 100% !important;
  max-width: 100% !important;
}
</style>

@verbatim
<!-- GUIDES HERO -->
<section style="padding:128px 0 64px;background:var(--bg)">
  <div class="wrap">
    <div style="text-align:center;max-width:740px;margin:0 auto">
      <div class="eyebrow" style="justify-content:center">Guides & Tutorials</div>
      <h1 class="h1" style="margin-bottom:18px">Master Our Tools with<br><span style="color:var(--g)">Step-by-Step Guides</span></h1>
      <p class="body-lg">
        Learn how to get the most out of ToolVerse Hub with our comprehensive guides, tutorials, and how-to articles.
      </p>
    </div>
  </div>
</section>

<!-- SEARCH BAR -->
<section style="background:var(--bg);padding:0 0 48px">
  <div class="wrap">
    <div style="max-width:640px;margin:0 auto">
      <div style="position:relative">
        <input type="text" id="guideSearch" placeholder="Search guides..." 
          style="width:100%;padding:16px 52px 16px 20px;border:1.5px solid var(--bdr);border-radius:999px;font-size:.95rem;outline:none;background:#fff;box-shadow:var(--s1)"
          onfocus="this.style.borderColor='var(--g)'"
          onblur="this.style.borderColor='var(--bdr)'">
        <i class="fas fa-search" style="position:absolute;right:22px;top:50%;transform:translateY(-50%);color:var(--mist);font-size:.95rem"></i>
      </div>
    </div>
  </div>
</section>

<!-- GUIDE CATEGORIES -->
<section style="background:var(--bg);padding:0 0 88px">
  <div class="wrap">
    
    <!-- Image Tools Guides -->
    <div style="margin-bottom:64px">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:28px">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--gl);display:flex;align-items:center;justify-content:center;font-size:1.5rem">
          🖼️
        </div>
        <div>
          <h2 class="h2" style="margin-bottom:2px">Image Tools Guides</h2>
          <p style="font-size:.875rem;color:var(--mid)">Learn how to convert, compress, and edit images</p>
        </div>
      </div>
      
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px">
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">📸</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">How to Convert Images</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Step-by-step guide to convert images between PNG, JPG, WEBP, and other formats.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--g)">Read Guide →</span>
        </a>
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">🗜️</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Image Compression Guide</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Reduce image file size without losing quality. Perfect for web optimization.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--g)">Read Guide →</span>
        </a>
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">✂️</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Resize Images Perfectly</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Learn how to resize images for social media, websites, and print.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--g)">Read Guide →</span>
        </a>
        
      </div>
    </div>
    
    <!-- PDF Tools Guides -->
    <div style="margin-bottom:64px">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:28px">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--cl);display:flex;align-items:center;justify-content:center;font-size:1.5rem">
          📄
        </div>
        <div>
          <h2 class="h2" style="margin-bottom:2px">PDF Tools Guides</h2>
          <p style="font-size:.875rem;color:var(--mid)">Master PDF editing, merging, and conversion</p>
        </div>
      </div>
      
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px">
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">🔗</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Merge PDFs Easily</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Combine multiple PDF files into one document in seconds.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--c)">Read Guide →</span>
        </a>
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">✂️</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Split PDF Pages</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Extract specific pages or split PDFs into multiple files.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--c)">Read Guide →</span>
        </a>
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">🗜️</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Compress PDF Files</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Reduce PDF file size for easier sharing and faster uploads.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--c)">Read Guide →</span>
        </a>
        
      </div>
    </div>
    
    <!-- Gaming Guides -->
    <div style="margin-bottom:64px">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:28px">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;font-size:1.5rem">
          🎮
        </div>
        <div>
          <h2 class="h2" style="margin-bottom:2px">Gaming Guides</h2>
          <p style="font-size:.875rem;color:var(--mid)">Tips, tricks, and walkthroughs for popular games</p>
        </div>
      </div>
      
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px">
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">🏃</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Best Action Games</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Discover the most exciting action games and master gameplay strategies.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--b)">Read Guide →</span>
        </a>
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">🧩</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Puzzle Game Tips</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Solve challenging puzzles with our expert tips and walkthroughs.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--b)">Read Guide →</span>
        </a>
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">🏎️</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Racing Game Mastery</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Win races with advanced techniques and shortcuts.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--b)">Read Guide →</span>
        </a>
        
      </div>
    </div>
    
    <!-- General Guides -->
    <div>
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:28px">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--al);display:flex;align-items:center;justify-content:center;font-size:1.5rem">
          📚
        </div>
        <div>
          <h2 class="h2" style="margin-bottom:2px">General Guides</h2>
          <p style="font-size:.875rem;color:var(--mid)">Platform tips and best practices</p>
        </div>
      </div>
      
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px">
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">🚀</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Getting Started</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            New to ToolVerse Hub? Start here to learn the basics.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--a)">Read Guide →</span>
        </a>
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">💡</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Pro Tips & Tricks</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Advanced techniques to maximize productivity with our tools.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--a)">Read Guide →</span>
        </a>
        
        <a href="/blog" class="guide-card" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--s1);transition:all .25s;text-decoration:none;display:block">
          <div style="font-size:2rem;margin-bottom:12px">❓</div>
          <h3 style="font-size:1.05rem;font-weight:700;color:var(--ink);margin-bottom:8px">Frequently Asked Questions</h3>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.65;margin-bottom:12px">
            Quick answers to common questions about our platform.
          </p>
          <span style="font-size:.8rem;font-weight:700;color:var(--a)">Read Guide →</span>
        </a>
        
      </div>
    </div>
    
  </div>
</section>

<!-- CTA -->
<section style="background:var(--bg2);padding:88px 0">
  <div class="wrap">
    <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:52px;text-align:center;max-width:740px;margin:0 auto">
      <div style="width:72px;height:72px;background:var(--gl);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:2rem;margin:0 auto 20px">
        💬
      </div>
      <h2 class="h2" style="margin-bottom:12px">Can't Find What You're Looking For?</h2>
      <p style="font-size:1rem;color:var(--mid);margin-bottom:28px">
        Our support team is here to help. Contact us with your questions and we'll create a guide just for you.
      </p>
      <a href="/contact" class="btn btn-g btn-lg">Contact Support</a>
    </div>
  </div>
</section>
@endverbatim

<script>
// Search functionality
document.getElementById('guideSearch').addEventListener('input', function() {
  const searchTerm = this.value.toLowerCase();
  const guideCards = document.querySelectorAll('.guide-card');
  
  guideCards.forEach(card => {
    const title = card.querySelector('h3').textContent.toLowerCase();
    const description = card.querySelector('p').textContent.toLowerCase();
    
    if (title.includes(searchTerm) || description.includes(searchTerm)) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
});
</script>

<!-- Include Scripts -->
@include('website.partials.scripts')

@endsection
