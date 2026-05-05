@verbatim
<!-- FOOTER -->
<footer id="footer" style="background:#0F1A12;padding:66px 0 28px">
  <style>
    @media (max-width: 768px) {
      #footer {
        padding: 48px 0 24px !important;
      }
    }
    @media (max-width: 480px) {
      #footer {
        padding: 36px 0 20px !important;
      }
    }
  </style>
  <div class="wrap">
    <style>
      .footer-grid {
        display: grid;
        grid-template-columns: 1.7fr 1fr 1fr 1fr 1fr;
        gap: 40px;
        margin-bottom: 52px;
      }
      @media (max-width: 1024px) {
        .footer-grid {
          grid-template-columns: 2fr 1fr 1fr 1fr !important;
          gap: 30px !important;
        }
        .footer-grid > div:first-child {
          grid-column: 1 / -1;
          margin-bottom: 20px;
          text-align: center;
        }
        .footer-grid > div:not(:first-child) {
          text-align: center;
        }
      }
      @media (max-width: 768px) {
        .footer-grid {
          grid-template-columns: 1fr 1fr !important;
          gap: 30px 20px !important;
          margin-bottom: 40px !important;
        }
        .footer-grid > div:first-child {
          grid-column: 1 / -1;
          text-align: center;
          margin-bottom: 20px;
          padding-bottom: 30px;
          border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .footer-grid > div:not(:first-child) {
          text-align: center;
        }
        .footer-section {
          padding: 20px 15px;
          background: rgba(255,255,255,.02);
          border-radius: 12px;
          border: 1px solid rgba(255,255,255,.05);
        }
        .footer-section h5 {
          margin-bottom: 16px !important;
          font-size: .75rem !important;
          color: #6ECB8F !important;
        }
        .footer-section a {
          display: block;
          padding: 6px 0;
          font-size: .8rem !important;
          transition: color 0.2s;
        }
        .footer-section a:hover {
          color: #6ECB8F !important;
        }
      }
      .footer-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding-top: 24px;
        border-top: 1px solid rgba(255,255,255,.06);
      }
      @media (max-width: 768px) {
        .footer-bottom {
          flex-direction: column;
          text-align: center;
          gap: 20px;
          padding-top: 30px;
        }
        .footer-bottom p {
          order: 2;
          font-size: .8rem !important;
        }
        .footer-bottom > div {
          order: 1;
        }
        .footer-bottom > div a {
          font-size: .75rem !important;
          padding: 0 8px;
          border-right: 1px solid rgba(255,255,255,.2);
        }
        .footer-bottom > div a:last-child {
          border-right: none;
        }
      }
    </style>
    <div class="footer-grid">
      <div>
@endverbatim
        <div style="font-family:var(--f1);font-size:1.2rem;font-weight:700;color:#F5F2E8;display:flex;align-items:center;gap:9px;margin-bottom:11px;justify-content:inherit">
          @if($logoUrl)
            <img src="{{ $logoUrl }}" alt="{{ $websiteName }}" style="height:28px;width:auto">
          @else
            <div class="logo-mark" style="width:28px;height:28px;border-radius:8px;font-size:.82rem">🌿</div>
            @php
              // Split website name to style middle word
              $words = explode(' ', $websiteName);
              if(count($words) === 3) {
                echo $words[0] . '<em style="color:#6ECB8F">' . $words[1] . '</em> ' . $words[2];
              } else {
                echo $websiteName;
              }
            @endphp
          @endif
        </div>
@verbatim
        <p style="font-size:.81rem;color:rgba(245,242,232,.28);line-height:1.72;margin-bottom:18px;max-width:300px;margin-left:auto;margin-right:auto">
@endverbatim
          {{ $websiteDescription }}
@verbatim
        </p>
@endverbatim
        <div style="display:flex;gap:8px;justify-content:center;flex-wrap:wrap">
          @php
          $footerSocialIcons = [
              'facebook' => ['icon' => 'fab fa-facebook-f', 'color' => '#1877f2'],
              'twitter' => ['icon' => 'fab fa-twitter', 'color' => '#1da1f2'],
              'instagram' => ['icon' => 'fab fa-instagram', 'color' => '#e4405f'],
              'linkedin' => ['icon' => 'fab fa-linkedin-in', 'color' => '#0077b5'],
              'youtube' => ['icon' => 'fab fa-youtube', 'color' => '#ff0000'],
              'pinterest' => ['icon' => 'fab fa-pinterest-p', 'color' => '#e60023'],
              'tiktok' => ['icon' => 'fab fa-tiktok', 'color' => '#000000'],
              'github' => ['icon' => 'fab fa-github', 'color' => '#333333']
          ];
          @endphp
          
          @foreach($footerSocialIcons as $platform => $details)
            @if(isset($globalSocialMedia[$platform]) && $globalSocialMedia[$platform]['active'] && !empty($globalSocialMedia[$platform]['url']))
              <a href="{{ $globalSocialMedia[$platform]['url'] }}" target="_blank" rel="noopener noreferrer"
                style="width:32px;height:32px;border-radius:8px;background:{{ $details['color'] }};border:1px solid {{ $details['color'] }};display:flex;align-items:center;justify-content:center;font-size:.85rem;color:#fff;transition:all .2s;opacity:0.9"
                onmouseover="this.style.opacity='1';this.style.transform='translateY(-2px)'"
                onmouseout="this.style.opacity='0.9';this.style.transform='translateY(0)'">
                <i class="{{ $details['icon'] }}"></i>
              </a>
            @endif
          @endforeach
        </div>
@verbatim
      </div>
      
      <div class="footer-section">
        <h5 style="font-size:.69rem;font-weight:800;letter-spacing:.11em;text-transform:uppercase;color:rgba(255,255,255,.2);margin-bottom:14px">Products</h5>
        <div style="display:flex;flex-direction:column;gap:8px">
@endverbatim
          @forelse($footerTools as $tool)
            <a href="{{ $tool->url ?? '#' }}" target="_blank" style="font-size:.82rem;color:rgba(245,242,232,.35)">{{ $tool->name }}</a>
          @empty
            <a href="https://imgconvertpro.site/" style="font-size:.82rem;color:rgba(245,242,232,.35)">IMGConvertPro</a>
            <a href="https://demo.smartpdfs.in/" style="font-size:.82rem;color:rgba(245,242,232,.35)">SmartPDFs</a>
            <a href="https://zapgames.fun/" style="font-size:.82rem;color:rgba(245,242,232,.35)">ZapGames</a>
          @endforelse
@verbatim
        </div>
      </div>
      
      <div class="footer-section">
        <h5 style="font-size:.69rem;font-weight:800;letter-spacing:.11em;text-transform:uppercase;color:rgba(255,255,255,.2);margin-bottom:14px">Resources</h5>
        <div style="display:flex;flex-direction:column;gap:8px">
          <a href="/blog" style="font-size:.82rem;color:rgba(245,242,232,.35)">Blog</a>
          <a href="/guides" style="font-size:.82rem;color:rgba(245,242,232,.35)">Guides</a>
          <a href="/faq" style="font-size:.82rem;color:rgba(245,242,232,.35)">FAQ</a>
        </div>
      </div>
      
      <div class="footer-section">
        <h5 style="font-size:.69rem;font-weight:800;letter-spacing:.11em;text-transform:uppercase;color:rgba(255,255,255,.2);margin-bottom:14px">Company</h5>
        <div style="display:flex;flex-direction:column;gap:8px">
          <a href="/about" style="font-size:.82rem;color:rgba(245,242,232,.35)">About</a>
          <a href="/contact" style="font-size:.82rem;color:rgba(245,242,232,.35)">Contact</a>
        </div>
      </div>
      
      <div class="footer-section">
        <h5 style="font-size:.69rem;font-weight:800;letter-spacing:.11em;text-transform:uppercase;color:rgba(255,255,255,.2);margin-bottom:14px">Legal</h5>
        <div style="display:flex;flex-direction:column;gap:8px">
          <a href="/privacy-policy" style="font-size:.82rem;color:rgba(245,242,232,.35)">Privacy</a>
          <a href="/terms-of-service" style="font-size:.82rem;color:rgba(245,242,232,.35)">Terms</a>
          <a href="/cookies-policy" style="font-size:.82rem;color:rgba(245,242,232,.35)">Cookies</a>
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
@endverbatim
      <p style="font-size:.77rem;color:rgba(255,255,255,.2)">{{ $footerText }}</p>
@verbatim
      <div style="display:flex;gap:18px;flex-wrap:wrap;justify-content:center">
        <a href="/privacy-policy" style="font-size:.74rem;color:rgba(255,255,255,.2)">Privacy Policy</a>
        <a href="/terms-of-service" style="font-size:.74rem;color:rgba(255,255,255,.2)">Terms of Service</a>
        <a href="/cookies-policy" style="font-size:.74rem;color:rgba(255,255,255,.2)">Cookie Policy</a>
      </div>
    </div>
  </div>
</footer>
@endverbatim
