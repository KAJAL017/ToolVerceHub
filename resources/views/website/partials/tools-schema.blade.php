{{-- 
  Tools Listing Page Schema
  
  Includes:
  - ItemList schema (all tools)
  - CollectionPage schema
  - BreadcrumbList schema
--}}

@php
$websiteUrl = $settings['website_url'] ?? config('app.url');
$websiteName = $settings['website_name'] ?? config('app.name');

// ItemList Schema for All Tools
$toolsList = [];
foreach ($tools as $index => $tool) {
    $toolsList[] = [
        '@type' => 'ListItem',
        'position' => $index + 1,
        'item' => [
            '@type' => 'SoftwareApplication',
            'name' => $tool->name,
            'description' => $tool->description ?? '',
            'url' => $tool->url ?? '#',
            'applicationCategory' => 'WebApplication',
            'operatingSystem' => 'Any',
            'offers' => [
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'USD',
            ],
        ],
    ];
}

$itemListSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => 'Free Online Tools Directory',
    'description' => 'Complete collection of 130+ free online tools for image conversion, PDF editing, and productivity',
    'numberOfItems' => $tools->total(),
    'itemListElement' => $toolsList,
];

// CollectionPage Schema
$collectionSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Free Online Tools',
    'description' => 'Browse our complete collection of free online tools',
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
        'name' => 'Tools',
        'item' => route('tools'),
    ],
];

// Add category to breadcrumb if filtered
if (request('category')) {
    $category = \App\Models\ToolCategory::where('slug', request('category'))->first();
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
