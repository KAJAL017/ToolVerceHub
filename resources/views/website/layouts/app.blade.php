<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title', 'ToolVerse Hub — Free Image Converter, PDF Tools & Online Games')</title>
<meta name="description" content="@yield('description', 'One free hub for 130+ tools: convert images, edit PDFs, and play 500+ HTML5 games.')">
<link rel="canonical" href="{{ url()->current() }}">
<meta name="robots" content="index,follow">

{{-- Open Graph Meta Tags --}}
<meta property="og:type" content="website">
<meta property="og:title" content="@yield('title', 'ToolVerse Hub — Free Image Converter, PDF Tools & Online Games')">
<meta property="og:description" content="@yield('description', 'One free hub for 130+ tools: convert images, edit PDFs, and play 500+ HTML5 games.')">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="{{ $settings['website_name'] ?? 'ToolVerse Hub' }}">
<meta property="og:image" content="@yield('og_image', $settings['og_image'] ?? asset('images/og-image.jpg'))">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

{{-- Twitter Card Meta Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('title', 'ToolVerse Hub — Free Image Converter, PDF Tools & Online Games')">
<meta name="twitter:description" content="@yield('description', 'One free hub for 130+ tools: convert images, edit PDFs, and play 500+ HTML5 games.')">
<meta name="twitter:image" content="@yield('og_image', $settings['og_image'] ?? asset('images/og-image.jpg'))">
@if(isset($settings['twitter_site']) && $settings['twitter_site'])
<meta name="twitter:site" content="{{ $settings['twitter_site'] }}">
@endif

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&family=DM+Sans:wght@400;500;600;700&display=swap">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@include('website.partials.styles')

@yield('extra_styles')

{{-- Schema.org Structured Data --}}
@yield('schema')
</head>
<body>
<div id="prog"></div>

@include('website.partials.mobile-nav')

@include('website.partials.header')

<main>
    @yield('content')
</main>

@include('website.partials.footer')

@include('website.partials.scripts')

@yield('extra_scripts')

</body>
</html>
