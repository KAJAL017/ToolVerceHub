@extends('website.layouts.app')

@section('title', $page->title . ' — ToolVerse Hub')
@section('description', $page->meta_description ?? 'ToolVerse Hub - Free Image Converter, PDF Tools & Online Games')

@section('content')

<!-- Include Styles -->
@include('website.partials.styles')

<!-- PAGE HERO -->
<section style="padding:128px 0 48px;background:var(--bg)">
  <div class="wrap">
    <div style="max-width:1080px;margin:0 auto">
      <div class="eyebrow" style="justify-content:center">Legal</div>
      <h1 class="h1" style="margin-bottom:18px;text-align:center">{{ $page->title }}</h1>
      <p style="text-align:center;font-size:.875rem;color:var(--mist)">
        Last updated: {{ $page->updated_at->format('F d, Y') }}
      </p>
    </div>
  </div>
</section>

<!-- PAGE CONTENT -->
<section style="background:var(--bg);padding:0 0 88px">
  <div class="wrap">
    <div style="max-width:1080px;margin:0 auto">
      <div class="page-content" style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;padding:48px;box-shadow:var(--s1)">
        {!! $page->content !!}
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
        <a href="{{ route('tools') }}" class="btn btn-g btn-lg">🚀 Start Free Now</a>
        <a href="{{ route('blog') }}" class="btn btn-out btn-lg" style="color:#F5F2E8;border-color:rgba(255,255,255,.2)">📚 Read Our Blog</a>
      </div>
    </div>
  </div>
</section>

<style>
.page-content {
  font-size: 1rem;
  line-height: 1.8;
  color: var(--ink);
}

.page-content h1 {
  font-size: 2rem;
  font-weight: 700;
  color: var(--ink);
  margin-top: 2.5rem;
  margin-bottom: 1rem;
  line-height: 1.3;
}

.page-content h2 {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--ink);
  margin-top: 2rem;
  margin-bottom: 0.875rem;
  line-height: 1.3;
}

.page-content h3 {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--ink);
  margin-top: 1.75rem;
  margin-bottom: 0.75rem;
  line-height: 1.4;
}

.page-content p {
  margin-bottom: 1.25rem;
  color: var(--mid);
}

.page-content ul,
.page-content ol {
  margin-bottom: 1.25rem;
  padding-left: 1.75rem;
  color: var(--mid);
}

.page-content ul {
  list-style-type: disc;
}

.page-content ol {
  list-style-type: decimal;
}

.page-content li {
  margin-bottom: 0.5rem;
  line-height: 1.7;
}

.page-content a {
  color: var(--g);
  text-decoration: underline;
  font-weight: 600;
  transition: color 0.2s;
}

.page-content a:hover {
  color: #16a34a;
}

.page-content strong {
  font-weight: 700;
  color: var(--ink);
}

.page-content em {
  font-style: italic;
}

.page-content code {
  background: var(--bg2);
  padding: 0.125rem 0.375rem;
  border-radius: 0.25rem;
  font-family: 'Courier New', monospace;
  font-size: 0.875em;
  color: var(--c);
}

.page-content pre {
  background: var(--bg2);
  padding: 1rem;
  border-radius: 0.5rem;
  overflow-x: auto;
  margin-bottom: 1.25rem;
}

.page-content pre code {
  background: none;
  padding: 0;
}

.page-content blockquote {
  border-left: 4px solid var(--g);
  padding-left: 1.25rem;
  margin: 1.5rem 0;
  font-style: italic;
  color: var(--mid);
}

.page-content table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 1.5rem;
}

.page-content table th,
.page-content table td {
  border: 1px solid var(--bdr);
  padding: 0.75rem;
  text-align: left;
}

.page-content table th {
  background: var(--bg2);
  font-weight: 700;
  color: var(--ink);
}

.page-content hr {
  border: none;
  border-top: 1.5px solid var(--bg2);
  margin: 2rem 0;
}
</style>

<!-- Include Scripts -->
@include('website.partials.scripts')

@endsection
