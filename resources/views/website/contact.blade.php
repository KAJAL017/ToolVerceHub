@extends('website.layouts.app')

@section('title', \App\Models\Setting::where('key', 'contact_page_title')->value('value') ?? 'Contact Us — ToolVerse Hub')
@section('description', 'Get in touch with ToolVerse Hub. We\'re here to help with questions, feedback, or support. Reach out via email, social media, or our contact form.')

@section('content')

<!-- Include Styles -->
@include('website.partials.styles')

<style>
/* Contact Page Responsive Styles */
@media (max-width: 768px) {
  section[style*="padding:128px"] {
    padding: 80px 0 40px !important;
  }
  
  section[style*="padding:0 0 88px"] {
    padding: 0 0 60px !important;
  }
  
  section[style*="padding:64px 0"] {
    padding: 48px 0 !important;
  }
  
  div[style*="grid-template-columns:1fr 1fr"] {
    grid-template-columns: 1fr !important;
  }
  
  div[style*="padding:42px"] {
    padding: 28px !important;
  }
  
  div[style*="padding:32px"] {
    padding: 24px !important;
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
}

@media (max-width: 480px) {
  section[style*="padding:128px"] {
    padding: 60px 0 30px !important;
  }
  
  section[style*="padding:0 0 88px"] {
    padding: 0 0 40px !important;
  }
  
  section[style*="padding:64px 0"] {
    padding: 40px 0 !important;
  }
  
  div[style*="padding:42px"],
  div[style*="padding:28px"] {
    padding: 20px !important;
  }
  
  div[style*="padding:32px"],
  div[style*="padding:24px"] {
    padding: 18px !important;
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
  
  div[style*="width:48px;height:48px"] {
    width: 42px !important;
    height: 42px !important;
    font-size: 1.1rem !important;
  }
  
  div[style*="width:72px;height:72px"] {
    width: 60px !important;
    height: 60px !important;
    font-size: 1.75rem !important;
  }
  
  div[style*="display:flex;gap:16px"] {
    gap: 12px !important;
  }
  
  div[style*="display:flex;gap:24px"] {
    gap: 18px !important;
  }
}

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

/* Form inputs responsive */
input, select, textarea {
  max-width: 100% !important;
  box-sizing: border-box !important;
}

/* Social media icons responsive */
@media (max-width: 480px) {
  div[style*="display:flex;gap:12px;flex-wrap:wrap"] a {
    width: 44px !important;
    height: 44px !important;
    font-size: 1rem !important;
  }
}
</style>

@verbatim
<!-- CONTACT HERO -->
<section style="padding:128px 0 64px;background:var(--bg)">
  <div class="wrap">
    <div style="text-align:center;max-width:640px;margin:0 auto">
      <div class="eyebrow" style="justify-content:center">Contact Us</div>
      <h1 class="h1" style="margin-bottom:18px">Let's Start a<br><span style="color:var(--g)">Conversation</span></h1>
      <p class="body-lg">
        Have questions, feedback, or need support? We're here to help. Reach out and we'll get back to you as soon as possible.
      </p>
    </div>
  </div>
</section>

<!-- CONTACT CONTENT -->
<section style="background:var(--bg);padding:0 0 88px">
  <div class="wrap">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:32px">
      
      <!-- Contact Form -->
      <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:42px;box-shadow:var(--s1)">
        <h2 class="h2" style="margin-bottom:8px">Send us a Message</h2>
        <p style="font-size:.875rem;color:var(--mid);margin-bottom:28px">
          Fill out the form below and we'll respond within 24 hours.
        </p>
        
        <form id="contactForm">
          <div style="margin-bottom:20px">
            <label style="display:block;font-size:.875rem;font-weight:600;color:var(--ink);margin-bottom:8px">
              Your Name <span style="color:#ef4444">*</span>
            </label>
            <input type="text" name="name" required
              style="width:100%;padding:12px 16px;border:1.5px solid var(--bdr);border-radius:12px;font-size:.875rem;outline:none;transition:all .2s"
              placeholder="John Doe"
              onfocus="this.style.borderColor='var(--g)'"
              onblur="this.style.borderColor='var(--bdr)'">
          </div>
          
          <div style="margin-bottom:20px">
            <label style="display:block;font-size:.875rem;font-weight:600;color:var(--ink);margin-bottom:8px">
              Email Address <span style="color:#ef4444">*</span>
            </label>
            <input type="email" name="email" required
              style="width:100%;padding:12px 16px;border:1.5px solid var(--bdr);border-radius:12px;font-size:.875rem;outline:none;transition:all .2s"
              placeholder="john@example.com"
              onfocus="this.style.borderColor='var(--g)'"
              onblur="this.style.borderColor='var(--bdr)'">
          </div>
          
          <div style="margin-bottom:20px">
            <label style="display:block;font-size:.875rem;font-weight:600;color:var(--ink);margin-bottom:8px">
              Phone Number
            </label>
            <input type="tel" name="phone" maxlength="20" pattern="[+]?[0-9\s\-\(\)]+"
              style="width:100%;padding:12px 16px;border:1.5px solid var(--bdr);border-radius:12px;font-size:.875rem;outline:none;transition:all .2s"
              placeholder="+91 98765 43210"
              onfocus="this.style.borderColor='var(--g)'"
              onblur="this.style.borderColor='var(--bdr)'"
              oninput="this.value = this.value.replace(/[^0-9+\s\-\(\)]/g, '')">
            <p style="font-size:.75rem;color:var(--mist);margin-top:4px">Enter 10-digit phone number with country code</p>
          </div>
          
          <div style="margin-bottom:20px">
            <label style="display:block;font-size:.875rem;font-weight:600;color:var(--ink);margin-bottom:8px">
              Subject <span style="color:#ef4444">*</span>
            </label>
            <select name="subject" required
              style="width:100%;padding:12px 16px;border:1.5px solid var(--bdr);border-radius:12px;font-size:.875rem;outline:none;transition:all .2s;background:#fff"
              onfocus="this.style.borderColor='var(--g)'"
              onblur="this.style.borderColor='var(--bdr)'">
              <option value="">Select a subject...</option>
              <option value="general">General Inquiry</option>
              <option value="support">Technical Support</option>
              <option value="feedback">Feedback</option>
              <option value="bug">Report a Bug</option>
              <option value="feature">Feature Request</option>
              <option value="partnership">Partnership</option>
              <option value="other">Other</option>
            </select>
          </div>
          
          <div style="margin-bottom:24px">
            <label style="display:block;font-size:.875rem;font-weight:600;color:var(--ink);margin-bottom:8px">
              Message <span style="color:#ef4444">*</span>
            </label>
            <textarea name="message" rows="6" required
              style="width:100%;padding:12px 16px;border:1.5px solid var(--bdr);border-radius:12px;font-size:.875rem;outline:none;transition:all .2s;resize:vertical"
              placeholder="Tell us how we can help you..."
              onfocus="this.style.borderColor='var(--g)'"
              onblur="this.style.borderColor='var(--bdr)'"></textarea>
          </div>
          
          <button type="submit" class="btn btn-g" style="width:100%">
            <span id="submitText">Send Message</span>
            <span id="submitLoader" style="display:none">Sending...</span>
          </button>
          
          <div id="formMessage" style="margin-top:16px;padding:12px;border-radius:8px;font-size:.875rem;display:none"></div>
        </form>
      </div>
      
      <!-- Contact Info -->
      <div>
@endverbatim
        <!-- Contact Cards (Dynamic) -->
        <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:32px;box-shadow:var(--s1);margin-bottom:24px">
          <h3 class="h3" style="margin-bottom:24px">Get in Touch</h3>
          
          <div style="display:flex;flex-direction:column;gap:24px">
            
            <!-- Email -->
            <div style="display:flex;gap:16px">
              <div style="width:48px;height:48px;border-radius:12px;background:var(--gl);display:flex;align-items:center;justify-content:center;font-size:1.25rem;flex-shrink:0">
                📧
              </div>
              <div>
                <div style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:var(--mist);margin-bottom:4px">Email</div>
                <a href="mailto:{{ $contactEmail }}" style="font-size:.95rem;font-weight:600;color:var(--g)">{{ $contactEmail }}</a>
                <p style="font-size:.8rem;color:var(--mid);margin-top:2px">We'll respond within 24 hours</p>
              </div>
            </div>
            
            <!-- Support -->
            <div style="display:flex;gap:16px">
              <div style="width:48px;height:48px;border-radius:12px;background:var(--cl);display:flex;align-items:center;justify-content:center;font-size:1.25rem;flex-shrink:0">
                🛟
              </div>
              <div>
                <div style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:var(--mist);margin-bottom:4px">Support</div>
                <a href="mailto:{{ $supportEmail }}" style="font-size:.95rem;font-weight:600;color:var(--c)">{{ $supportEmail }}</a>
                <p style="font-size:.8rem;color:var(--mid);margin-top:2px">Technical help & bug reports</p>
              </div>
            </div>
            
          </div>
        </div>
        
@verbatim
        
@endverbatim
        <!-- Social Media (Dynamic) -->
        <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:32px;box-shadow:var(--s1);margin-bottom:24px">
          <h3 class="h3" style="margin-bottom:20px">Follow Us</h3>
          <p style="font-size:.875rem;color:var(--mid);margin-bottom:20px">
            Stay updated with our latest tools, features, and news.
          </p>
          <div style="display:flex;gap:12px;flex-wrap:wrap">
            @php
            $socialPlatforms = [
                'facebook' => ['icon' => 'fab fa-facebook-f', 'color' => '#1877f2'],
                'twitter' => ['icon' => 'fab fa-twitter', 'color' => '#1da1f2'],
                'instagram' => ['icon' => 'fab fa-instagram', 'color' => '#e4405f'],
                'linkedin' => ['icon' => 'fab fa-linkedin-in', 'color' => '#0077b5'],
                'youtube' => ['icon' => 'fab fa-youtube', 'color' => '#ff0000'],
                'pinterest' => ['icon' => 'fab fa-pinterest-p', 'color' => '#e60023'],
                'tiktok' => ['icon' => 'fab fa-tiktok', 'color' => '#000000'],
                'github' => ['icon' => 'fab fa-github', 'color' => '#333333'],
            ];
            @endphp
            
            @foreach($socialPlatforms as $platform => $details)
              @if(isset($socialMedia[$platform]) && $socialMedia[$platform]['active'] && !empty($socialMedia[$platform]['url']))
                <a href="{{ $socialMedia[$platform]['url'] }}" target="_blank" rel="noopener noreferrer"
                  style="width:48px;height:48px;border-radius:12px;background:var(--bg2);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;font-size:1.1rem;transition:all .2s;color:var(--mid)"
                  onmouseover="this.style.background='{{ $details['color'] }}';this.style.borderColor='{{ $details['color'] }}';this.style.color='#fff'"
                  onmouseout="this.style.background='var(--bg2)';this.style.borderColor='var(--bdr)';this.style.color='var(--mid)'">
                  <i class="{{ $details['icon'] }}"></i>
                </a>
              @endif
            @endforeach
            
            @php
            $hasActiveSocial = false;
            foreach($socialMedia as $platform => $data) {
                if($data['active'] && !empty($data['url'])) {
                    $hasActiveSocial = true;
                    break;
                }
            }
            @endphp
            
            @if(!$hasActiveSocial)
              <p style="font-size:.875rem;color:var(--mist)">Social media links coming soon!</p>
            @endif
          </div>
        </div>

@verbatim
        
        <!-- FAQ Link -->
        <div style="background:linear-gradient(135deg,var(--gl),var(--al));border-radius:24px;padding:32px;text-align:center">
          <div style="font-size:2.5rem;margin-bottom:12px">❓</div>
          <h4 style="font-size:1.1rem;font-weight:700;color:var(--ink);margin-bottom:8px">Have a Quick Question?</h4>
          <p style="font-size:.875rem;color:var(--mid);margin-bottom:20px">
            Check our FAQ section for instant answers to common questions.
          </p>
          <a href="/faq" class="btn btn-out btn-sm">View FAQ</a>
        </div>
        
      </div>
      
    </div>
  </div>
</section>

<!-- RESPONSE TIME -->
<section style="background:var(--bg2);padding:64px 0">
  <div class="wrap">
    <div style="text-align:center;max-width:640px;margin:0 auto">
      <div style="width:72px;height:72px;border-radius:50%;background:#fff;display:flex;align-items:center;justify-content:center;font-size:2rem;margin:0 auto 20px;box-shadow:var(--s1)">
        ⚡
      </div>
      <h2 class="h2" style="margin-bottom:12px">Quick Response Time</h2>
      <p style="font-size:1rem;color:var(--mid);line-height:1.75">
        We typically respond to all inquiries within <strong style="color:var(--g)">24 hours</strong> during business days. For urgent technical issues, please email our support team directly.
      </p>
    </div>
  </div>
</section>
@endverbatim

<script>
// Clear all error messages
function clearErrors() {
    document.querySelectorAll('.field-error').forEach(el => el.remove());
    document.querySelectorAll('input, select, textarea').forEach(el => {
        el.style.borderColor = 'var(--bdr)';
    });
}

// Show error message below field
function showError(fieldName, message) {
    const field = document.querySelector(`[name="${fieldName}"]`);
    if (field) {
        field.style.borderColor = '#ef4444';
        
        // Remove existing error if any
        const existingError = field.parentElement.querySelector('.field-error');
        if (existingError) existingError.remove();
        
        // Add new error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error';
        errorDiv.style.cssText = 'color:#ef4444;font-size:.75rem;margin-top:4px;font-weight:500';
        errorDiv.textContent = message;
        field.parentElement.appendChild(errorDiv);
    }
}

// Form submission
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Clear previous errors
    clearErrors();
    
    const submitBtn = this.querySelector('button[type="submit"]');
    const submitText = document.getElementById('submitText');
    const submitLoader = document.getElementById('submitLoader');
    const formMessage = document.getElementById('formMessage');
    
    // Show loading state
    submitText.style.display = 'none';
    submitLoader.style.display = 'inline';
    submitBtn.disabled = true;
    formMessage.style.display = 'none';
    
    // Get form data
    const formData = new FormData(this);
    
    // Send AJAX request
    fetch('{{ route("contact.submit") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Reset button
        submitText.style.display = 'inline';
        submitLoader.style.display = 'none';
        submitBtn.disabled = false;
        
        if (data.success) {
            // Success message
            formMessage.style.display = 'block';
            formMessage.style.background = 'var(--gl)';
            formMessage.style.color = 'var(--g)';
            formMessage.style.border = '1.5px solid var(--g)';
            formMessage.textContent = '✓ ' + data.message;
            
            // Reset form
            this.reset();
            
            // Hide message after 5 seconds
            setTimeout(() => {
                formMessage.style.display = 'none';
            }, 5000);
        } else if (data.errors) {
            // Show validation errors
            Object.keys(data.errors).forEach(fieldName => {
                showError(fieldName, data.errors[fieldName][0]);
            });
            
            // Show error in message box
            formMessage.style.display = 'block';
            formMessage.style.background = '#fee2e2';
            formMessage.style.color = '#ef4444';
            formMessage.style.border = '1.5px solid #ef4444';
            formMessage.textContent = '✕ Please fix the errors below';
        } else {
            // Generic error
            formMessage.style.display = 'block';
            formMessage.style.background = '#fee2e2';
            formMessage.style.color = '#ef4444';
            formMessage.style.border = '1.5px solid #ef4444';
            formMessage.textContent = '✕ ' + (data.message || 'An error occurred. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        
        // Reset button
        submitText.style.display = 'inline';
        submitLoader.style.display = 'none';
        submitBtn.disabled = false;
        
        // Show error message
        formMessage.style.display = 'block';
        formMessage.style.background = '#fee2e2';
        formMessage.style.color = '#ef4444';
        formMessage.style.border = '1.5px solid #ef4444';
        formMessage.textContent = '✕ An error occurred. Please try again.';
    });
});

// Clear error on input
document.querySelectorAll('input, select, textarea').forEach(field => {
    field.addEventListener('input', function() {
        this.style.borderColor = 'var(--bdr)';
        const error = this.parentElement.querySelector('.field-error');
        if (error) error.remove();
    });
});
</script>

<!-- Include Scripts -->
@include('website.partials.scripts')

@endsection
