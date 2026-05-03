@extends('website.layouts.app')

@section('title', 'ToolVerse Hub — Free Image Converter, PDF Tools & Online Games')

@section('content')
@verbatim
<!-- HERO -->
<section id="hero">
  <div class="hero-orb o1"></div>
  <div class="hero-orb o2"></div>
  <div class="hero-orb o3"></div>
  <div class="wrap">
    <div style="display:grid;grid-template-columns:1fr 400px;gap:72px;align-items:center;position:relative;z-index:1">
      <div>
        <div style="display:inline-flex;align-items:center;gap:8px;background:var(--gl);border:1.5px solid var(--gb);border-radius:999px;padding:5px 15px 5px 7px;font-size:.72rem;font-weight:700;color:var(--g);margin-bottom:22px">
          <span style="width:22px;height:22px;border-radius:50%;background:var(--g);color:#fff;display:flex;align-items:center;justify-content:center;font-size:.68rem">🌿</span>
          The #1 Free Multi-Tool Platform
        </div>
        <h1 class="h1" style="margin-bottom:20px">
          All Your <span style="color:var(--g)">Free Digital</span><br>
          Tools <span style="color:var(--c)">Under One Roof.</span>
        </h1>
        <p style="font-size:1.05rem;line-height:1.78;color:var(--mid);max-width:490px;margin-bottom:34px">
          Convert images, edit PDFs, and play 500+ browser games — 100% free, zero signup required. Works on any device, any browser, instantly.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:10px;margin-bottom:38px">
          <a href="https://imgconvertpro.site/" class="btn btn-g btn-lg">🚀 Start Converting Free</a>
          <a href="#tools" class="btn btn-out btn-lg">📚 Browse All Tools</a>
        </div>
        <div style="display:flex;flex-wrap:wrap;gap:20px">
          <div style="display:flex;align-items:center;gap:7px;font-size:.82rem;font-weight:600;color:var(--mid)">
            <span style="width:8px;height:8px;border-radius:50%;background:var(--g)"></span>
            130+ Free Tools
          </div>
          <div style="display:flex;align-items:center;gap:7px;font-size:.82rem;font-weight:600;color:var(--mid)">
            <span style="width:8px;height:8px;border-radius:50%;background:var(--c)"></span>
            500+ HTML5 Games
          </div>
          <div style="display:flex;align-items:center;gap:7px;font-size:.82rem;font-weight:600;color:var(--mid)">
            <span style="width:8px;height:8px;border-radius:50%;background:var(--b)"></span>
            No Signup Required
          </div>
        </div>
      </div>
      
      <div style="display:flex;flex-direction:column;gap:12px">
        <a href="https://imgconvertpro.site/" style="display:flex;align-items:center;gap:14px;background:#fff;border:1.5px solid var(--bdr);border-radius:20px;padding:16px 18px;box-shadow:var(--s1);transition:all .22s;text-decoration:none;color:inherit">
          <div style="width:48px;height:48px;border-radius:12px;background:var(--gl);display:flex;align-items:center;justify-content:center;font-size:1.35rem">🖼️</div>
          <div style="flex:1">
            <div style="font-weight:700;font-size:.95rem;color:var(--ink)">IMGConvertPro</div>
            <div style="font-size:.73rem;font-weight:600;color:var(--mist)">80+ Image & File Tools</div>
          </div>
          <div style="display:flex;gap:5px">
            <span style="font-size:.62rem;font-weight:700;padding:3px 8px;border-radius:999px;background:var(--gl);color:var(--g)">FREE</span>
          </div>
        </a>
        
        <a href="https://demo.smartpdfs.in/" style="display:flex;align-items:center;gap:14px;background:#fff;border:1.5px solid var(--bdr);border-radius:20px;padding:16px 18px;box-shadow:var(--s1);transition:all .22s;text-decoration:none;color:inherit">
          <div style="width:48px;height:48px;border-radius:12px;background:var(--cl);display:flex;align-items:center;justify-content:center;font-size:1.35rem">📄</div>
          <div style="flex:1">
            <div style="font-weight:700;font-size:.95rem;color:var(--ink)">SmartPDFs</div>
            <div style="font-size:.73rem;font-weight:600;color:var(--mist)">50+ PDF Tools</div>
          </div>
          <div style="display:flex;gap:5px">
            <span style="font-size:.62rem;font-weight:700;padding:3px 8px;border-radius:999px;background:var(--cl);color:var(--c)">FREE</span>
          </div>
        </a>
        
        <a href="https://zapgames.fun/" style="display:flex;align-items:center;gap:14px;background:#fff;border:1.5px solid var(--bdr);border-radius:20px;padding:16px 18px;box-shadow:var(--s1);transition:all .22s;text-decoration:none;color:inherit">
          <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;font-size:1.35rem">🎮</div>
          <div style="flex:1">
            <div style="font-weight:700;font-size:.95rem;color:var(--ink)">ZapGames</div>
            <div style="font-size:.73rem;font-weight:600;color:var(--mist)">500+ HTML5 Games</div>
          </div>
          <div style="display:flex;gap:5px">
            <span style="font-size:.62rem;font-weight:700;padding:3px 8px;border-radius:999px;background:var(--bl);color:var(--b)">FREE</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section style="background:#1C2820;padding:38px 0">
  <div class="wrap">
    <div style="display:grid;grid-template-columns:repeat(4,1fr)">
      <div style="text-align:center;padding:6px 16px;border-right:1px solid rgba(255,255,255,.07)">
        <div style="font-family:var(--f1);font-style:italic;font-weight:700;font-size:2.6rem;line-height:1;margin-bottom:5px;color:#6ECB8F">130+</div>
        <div style="font-size:.74rem;font-weight:600;color:rgba(255,255,255,.32)">FREE TOOLS</div>
      </div>
      <div style="text-align:center;padding:6px 16px;border-right:1px solid rgba(255,255,255,.07)">
        <div style="font-family:var(--f1);font-style:italic;font-weight:700;font-size:2.6rem;line-height:1;margin-bottom:5px;color:#F08A65">500+</div>
        <div style="font-size:.74rem;font-weight:600;color:rgba(255,255,255,.32)">HTML5 GAMES</div>
      </div>
      <div style="text-align:center;padding:6px 16px;border-right:1px solid rgba(255,255,255,.07)">
        <div style="font-family:var(--f1);font-style:italic;font-weight:700;font-size:2.6rem;line-height:1;margin-bottom:5px;color:#8AABDE">100%</div>
        <div style="font-size:.74rem;font-weight:600;color:rgba(255,255,255,.32)">FREE FOREVER</div>
      </div>
      <div style="text-align:center;padding:6px 16px">
        <div style="font-family:var(--f1);font-style:italic;font-weight:700;font-size:2.6rem;line-height:1;margin-bottom:5px;color:#E8C06A">0</div>
        <div style="font-size:.74rem;font-weight:600;color:rgba(255,255,255,.32)">SIGNUP NEEDED</div>
      </div>
    </div>
  </div>
</section>

<!-- TOOLS SECTION -->
<section id="tools" style="background:var(--bg);padding:96px 0">
  <div class="wrap">
    <div style="margin-bottom:54px">
      <div class="eyebrow">Our Products</div>
      <h2 class="h2">Three Powerful Platforms,<br>One Unified Hub</h2>
      <p class="body-lg" style="max-width:490px;margin-top:9px">
        Access 130+ professional tools and 500+ games — all free, all browser-based, no downloads required.
      </p>
    </div>
    
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px">
      <!-- Tool Card 1 -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;overflow:hidden;box-shadow:var(--s1)">
        <div style="height:5px;background:linear-gradient(90deg,var(--g),#6ECB8F)"></div>
        <div style="padding:28px">
          <div style="width:54px;height:54px;border-radius:12px;background:var(--gl);display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:18px">🖼️</div>
          <h3 class="h3" style="margin-bottom:5px">IMGConvertPro</h3>
          <div style="font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--g);margin-bottom:13px">IMAGE TOOLS</div>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.72;margin-bottom:18px">
            Convert, compress, resize, and edit images in 20+ formats. Fast, secure, and completely free.
          </p>
          <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:20px">
            <span class="tag tag-g">PNG</span>
            <span class="tag tag-g">JPG</span>
            <span class="tag tag-g">WEBP</span>
            <span class="tag tag-g">AVIF</span>
          </div>
        </div>
        <div style="padding:18px 28px;background:var(--bg2);border-top:1.5px solid var(--bg3);display:flex;align-items:center;justify-content:space-between">
          <div>
            <div style="font-family:var(--f1);font-style:italic;font-weight:700;font-size:1.5rem;line-height:1;color:var(--g)">80+</div>
            <div style="font-size:.68rem;font-weight:700;color:var(--mist);margin-top:2px">TOOLS</div>
          </div>
          <a href="https://imgconvertpro.site/" class="btn btn-g btn-sm">Visit Site →</a>
        </div>
      </div>
      
      <!-- Tool Card 2 -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;overflow:hidden;box-shadow:var(--s1)">
        <div style="height:5px;background:linear-gradient(90deg,var(--c),#F08A65)"></div>
        <div style="padding:28px">
          <div style="width:54px;height:54px;border-radius:12px;background:var(--cl);display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:18px">📄</div>
          <h3 class="h3" style="margin-bottom:5px">SmartPDFs</h3>
          <div style="font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--c);margin-bottom:13px">PDF TOOLS</div>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.72;margin-bottom:18px">
            Merge, split, compress, and convert PDFs. Professional PDF editing right in your browser.
          </p>
          <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:20px">
            <span class="tag tag-c">MERGE</span>
            <span class="tag tag-c">SPLIT</span>
            <span class="tag tag-c">COMPRESS</span>
          </div>
        </div>
        <div style="padding:18px 28px;background:var(--bg2);border-top:1.5px solid var(--bg3);display:flex;align-items:center;justify-content:space-between">
          <div>
            <div style="font-family:var(--f1);font-style:italic;font-weight:700;font-size:1.5rem;line-height:1;color:var(--c)">50+</div>
            <div style="font-size:.68rem;font-weight:700;color:var(--mist);margin-top:2px">TOOLS</div>
          </div>
          <a href="https://demo.smartpdfs.in/" class="btn btn-c btn-sm">Visit Site →</a>
        </div>
      </div>
      
      <!-- Tool Card 3 -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;overflow:hidden;box-shadow:var(--s1)">
        <div style="height:5px;background:linear-gradient(90deg,var(--b),#8AABDE)"></div>
        <div style="padding:28px">
          <div style="width:54px;height:54px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:18px">🎮</div>
          <h3 class="h3" style="margin-bottom:5px">ZapGames</h3>
          <div style="font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--b);margin-bottom:13px">HTML5 GAMES</div>
          <p style="font-size:.875rem;color:var(--mid);line-height:1.72;margin-bottom:18px">
            Play 500+ free HTML5 games instantly. Action, puzzle, racing, and more — no downloads needed.
          </p>
          <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:20px">
            <span class="tag tag-b">ACTION</span>
            <span class="tag tag-b">PUZZLE</span>
            <span class="tag tag-b">RACING</span>
          </div>
        </div>
        <div style="padding:18px 28px;background:var(--bg2);border-top:1.5px solid var(--bg3);display:flex;align-items:center;justify-content:space-between">
          <div>
            <div style="font-family:var(--f1);font-style:italic;font-weight:700;font-size:1.5rem;line-height:1;color:var(--b)">500+</div>
            <div style="font-size:.68rem;font-weight:700;color:var(--mist);margin-top:2px">GAMES</div>
          </div>
          <a href="https://zapgames.fun/" class="btn btn-b btn-sm">Visit Site →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section style="background:var(--bg2);padding:88px 0">
  <div class="wrap">
    <div style="background:#1C2820;border-radius:24px;padding:72px 52px;text-align:center;position:relative;overflow:hidden">
      <div class="eyebrow" style="color:#6ECB8F;justify-content:center">Get Started Today</div>
      <h2 class="h2" style="color:#F5F2E8;margin-bottom:12px">Ready to Boost Your Productivity?</h2>
      <p class="body-lg" style="color:rgba(245,242,232,.45);margin-bottom:34px">
        Join thousands of users who trust ToolVerse Hub for their daily tasks.
      </p>
      <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
        <a href="https://imgconvertpro.site/" class="btn btn-g btn-lg">🚀 Start Free Now</a>
        <a href="/blog" class="btn btn-out btn-lg" style="color:#F5F2E8;border-color:rgba(255,255,255,.2)">📚 Read Our Blog</a>
      </div>
    </div>
  </div>
</section>
@endverbatim
@endsection
