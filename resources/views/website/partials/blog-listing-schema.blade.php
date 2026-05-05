{{-- 
  Blog Listing Page Schema
  
  Includes:
  - ItemList schema (blog posts)
  - CollectionPage schema
  - BreadcrumbList schema
--}}

@php
$websiteUrl = $settings['website_url'] ?? config('app.url');
$websiteName = $settings['website_name'] ?? config('app.name');

// ItemList Schema for Blog Posts
$blogList = [];
$position = 1;

// Featured blog
if (isset($featuredBlog) && $featuredBlog) {
    $blogList[] = [
        '@type' => 'ListItem',
        'position' => $position++,
        'item' => [
            '@type' => 'Article',
            'headline' => $featuredBlog->title,
            'description' => $featuredBlog->excerpt ?? '',
            'url' => route('blog.post', $featuredBlog->slug),
            'datePublished' => $featuredBlog->published_date->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => $featuredBlog->author_name ?? 'Editorial Team',
            ],
        ],
    ];
}

// Latest blogs
foreach ($latestBlogs as $blog) {
    $blogList[] = [
        '@type' => 'ListItem',
        'position' => $position++,
        'item' => [
            '@type' => 'Article',
            'headline' => $blog->title,
            'description' => $blog->excerpt ?? '',
            'url' => route('blog.post', $blog->slug),
            'datePublished' => $blog->published_date->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => $blog->author_name ?? 'Editorial Team',
            ],
        ],
    ];
}

$itemListSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => 'Blog Posts',
    'description' => 'Expert guides and tutorials on image conversion, PDF tools, and online games',
    'numberOfItems' => count($blogList),
    'itemListElement' => $blogList,
];

// Blog CollectionPage Schema
$collectionSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Blog - Tips, Guides & Tutorials',
    'description' => 'Expert walkthroughs for image conversion, PDF editing, and free HTML5 games',
    'url' => url()->current(),
];

// BreadcrumbList Schema
$breadcrumbItems = [
    [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Home',
        'item' => $websiteUrl,
    ],
    [
        '@type' => 'ListItem',
        'position' => 2,
        'name' => 'Blog',
        'item' => route('blog'),
    ],
];

// Add category to breadcrumb if filtered
if (request('category')) {
    $category = \App\Models\BlogCategory::where('slug', request('category'))->first();
    if ($category) {
        $breadcrumbItems[] = [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $category->name,
            'item' => url()->current(),
        ];
    }
}

$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => $breadcrumbItems,
];
@endphp

{{-- ItemList Schema --}}
<script type="application/ld+json">
{!! json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

{{-- CollectionPage Schema --}}
<script type="application/ld+json">
{!! json_encode($collectionSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

{{-- Breadcrumb Schema --}}
<script type="application/ld+json">
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
