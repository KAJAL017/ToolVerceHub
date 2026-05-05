@extends('website.layouts.app')

@section('title', \App\Models\Setting::where('key', 'faq_page_title')->value('value') ?? 'FAQ — Frequently Asked Questions | ToolVerse Hub')
@section('description', 'Find answers to common questions about ToolVerse Hub. Learn about our tools, features, and how to get the most out of our platform.')

@section('content')

<!-- Include Styles -->
@include('website.partials.styles')

<style>
/* FAQ Page Responsive Styles */

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
  
  div[style*="padding:52px"] {
    padding: 32px !important;
  }
  
  div[style*="padding:20px 24px"] {
    padding: 16px 20px !important;
  }
  
  div[style*="padding:0 24px 20px 24px"] {
    padding: 0 20px 16px 20px !important;
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
  
  .faq-question {
    font-size: 0.95rem !important;
  }
  
  div[style*="width:40px;height:40px"] {
    width: 36px !important;
    height: 36px !important;
    font-size: 1.1rem !important;
  }
  
  div[style*="width:72px;height:72px"] {
    width: 60px !important;
    height: 60px !important;
    font-size: 1.75rem !important;
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
  
  div[style*="padding:52px"],
  div[style*="padding:32px"] {
    padding: 24px !important;
  }
  
  div[style*="padding:20px 24px"],
  div[style*="padding:16px 20px"] {
    padding: 14px 16px !important;
  }
  
  div[style*="padding:0 24px 20px 24px"],
  div[style*="padding:0 20px 16px 20px"] {
    padding: 0 16px 14px 16px !important;
  }
  
  .h1 {
    font-size: 1.75rem !important;
  }
  
  .h2 {
    font-size: 1.4rem !important;
  }
  
  .h3 {
    font-size: 1.1rem !important;
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
  
  .faq-question {
    font-size: 0.9rem !important;
    padding: 14px 16px !important;
  }
  
  .faq-answer div {
    font-size: 0.875rem !important;
  }
  
  div[style*="width:40px;height:40px"],
  div[style*="width:36px;height:36px"] {
    width: 32px !important;
    height: 32px !important;
    font-size: 1rem !important;
  }
  
  div[style*="width:72px;height:72px"],
  div[style*="width:60px;height:60px"] {
    width: 52px !important;
    height: 52px !important;
    font-size: 1.5rem !important;
  }
  
  div[style*="margin-bottom:48px"] {
    margin-bottom: 36px !important;
  }
  
  div[style*="gap:12px"] {
    gap: 10px !important;
  }
}

/* FAQ Item Responsive */
.faq-item {
  width: 100% !important;
  max-width: 100% !important;
  overflow: hidden !important;
}

.faq-question {
  width: 100% !important;
  max-width: 100% !important;
  word-wrap: break-word !important;
}

.faq-answer {
  width: 100% !important;
  max-width: 100% !important;
  overflow: hidden !important;
}
</style>

@verbatim
<!-- FAQ HERO -->
<section style="padding:128px 0 64px;background:var(--bg)">
  <div class="wrap">
    <div style="text-align:center;max-width:640px;margin:0 auto">
      <div class="eyebrow" style="justify-content:center">FAQ</div>
      <h1 class="h1" style="margin-bottom:18px">Frequently Asked<br><span style="color:var(--g)">Questions</span></h1>
      <p class="body-lg">
        Find quick answers to common questions about ToolVerse Hub, our tools, and features.
      </p>
    </div>
  </div>
</section>
@endverbatim

<!-- FAQ CONTENT -->
<section style="background:var(--bg);padding:0 0 88px">
  <div class="wrap">
    <div style="max-width:1080px;margin:0 auto">
      
      @if($faqs->count() > 0)
        
        @foreach(['general' => 'General Questions', 'tools' => 'Tools & Features', 'games' => 'Games', 'account' => 'Account & Support'] as $category => $title)
          @if(isset($faqs[$category]) && $faqs[$category]->count() > 0)
            
            <!-- Category Section -->
            <div style="margin-bottom:48px">
              <h2 class="h2" style="margin-bottom:24px;display:flex;align-items:center;gap:12px">
                <span style="width:40px;height:40px;border-radius:10px;background:
                  @if($category == 'general') var(--gl)
                  @elseif($category == 'tools') var(--gl)
                  @elseif($category == 'games') var(--bl)
                  @else var(--cl)
                  @endif
                ;display:flex;align-items:center;justify-content:center;font-size:1.2rem">
                  @if($category == 'general') 📋
                  @elseif($category == 'tools') 🛠️
                  @elseif($category == 'games') 🎮
                  @else 👤
                  @endif
                </span>
                {{ $title }}
              </h2>
              
              <div style="display:flex;flex-direction:column;gap:12px">
                @foreach($faqs[$category] as $faq)
                  
                  <!-- FAQ Item -->
                  <div class="faq-item" style="background:#fff;border:1.5px solid var(--bdr);border-radius:16px;overflow:hidden;box-shadow:var(--s1);transition:all .25s">
                    <button class="faq-question" onclick="toggleFaq(this)" style="width:100%;text-align:left;padding:20px 24px;display:flex;align-items:center;justify-content:space-between;background:none;border:none;cursor:pointer;font-size:1.05rem;font-weight:700;color:var(--ink);transition:all .2s">
                      <span>{{ $faq->question }}</span>
                      <i class="fas fa-chevron-down" style="color:var(--g);transition:transform .3s;font-size:.9rem"></i>
                    </button>
                    <div class="faq-answer" style="max-height:0;overflow:hidden;transition:max-height .3s ease">
                      <div style="padding:0 24px 20px 24px;font-size:.95rem;color:var(--mid);line-height:1.75">
                        {!! nl2br(e($faq->answer)) !!}
                      </div>
                    </div>
                  </div>
                  
                @endforeach
              </div>
            </div>
            
          @endif
        @endforeach
        
      @else
        
        <!-- No FAQs -->
        <div style="text-align:center;padding:60px 20px;background:#fff;border:1.5px solid var(--bdr);border-radius:24px">
          <div style="font-size:4rem;margin-bottom:20px">❓</div>
          <h3 class="h3" style="margin-bottom:12px">No FAQs Available</h3>
          <p class="body" style="color:var(--mid)">Check back soon for frequently asked questions!</p>
        </div>
        
      @endif
      
    </div>
  </div>
</section>

<!-- STILL HAVE QUESTIONS -->
<section style="background:var(--bg2);padding:88px 0">
  <div class="wrap">
    <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:52px;text-align:center;max-width:640px;margin:0 auto">
      <div style="width:72px;height:72px;background:var(--gl);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:2rem;margin:0 auto 20px">
        💬
      </div>
      <h2 class="h2" style="margin-bottom:12px">Still Have Questions?</h2>
      <p style="font-size:1rem;color:var(--mid);margin-bottom:28px">
        Can't find the answer you're looking for? Our support team is here to help.
      </p>
      <a href="/contact" class="btn btn-g btn-lg">Contact Support</a>
    </div>
  </div>
</section>

<script>
function toggleFaq(button) {
  const faqItem = button.closest('.faq-item');
  const answer = faqItem.querySelector('.faq-answer');
  const icon = button.querySelector('i');
  const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px';
  
  // Close all other FAQs
  document.querySelectorAll('.faq-answer').forEach(item => {
    if (item !== answer) {
      item.style.maxHeight = '0';
      item.closest('.faq-item').querySelector('i').style.transform = 'rotate(0deg)';
      item.closest('.faq-item').style.borderColor = 'var(--bdr)';
    }
  });
  
  // Toggle current FAQ
  if (isOpen) {
    answer.style.maxHeight = '0';
    icon.style.transform = 'rotate(0deg)';
    faqItem.style.borderColor = 'var(--bdr)';
  } else {
    answer.style.maxHeight = answer.scrollHeight + 'px';
    icon.style.transform = 'rotate(180deg)';
    faqItem.style.borderColor = 'var(--g)';
  }
}

// Hover effects
document.querySelectorAll('.faq-item').forEach(item => {
  item.addEventListener('mouseenter', function() {
    if (!this.querySelector('.faq-answer').style.maxHeight || this.querySelector('.faq-answer').style.maxHeight === '0px') {
      this.style.borderColor = 'var(--g)';
      this.style.transform = 'translateY(-2px)';
    }
  });
  
  item.addEventListener('mouseleave', function() {
    if (!this.querySelector('.faq-answer').style.maxHeight || this.querySelector('.faq-answer').style.maxHeight === '0px') {
      this.style.borderColor = 'var(--bdr)';
      this.style.transform = 'translateY(0)';
    }
  });
});
</script>

<!-- Include Scripts -->
@include('website.partials.scripts')

@endsection
