<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title', 'ToolVerse Hub — Free Image Converter, PDF Tools & Online Games')</title>
<meta name="description" content="@yield('description', 'One free hub for 130+ tools: convert images, edit PDFs, and play 500+ HTML5 games.')">
<link rel="canonical" href="{{ url()->current() }}">
<meta name="robots" content="index,follow">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

@include('website.partials.styles')

@yield('extra_styles')
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
