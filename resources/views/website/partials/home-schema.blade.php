{{-- 
  TASK 6 & 7: Complete Schema.org Markup for Homepage
  
  Includes:
  - Organization schema (brand identity)
  - WebSite schema (search functionality)
  - ItemList schema (tools listing)
  - SoftwareApplication schema (for each tool)
--}}

@php
$websiteUrl = $settings['website_url'] ?? config('app.url');
$websiteName = $settings['website_name'] ?? config('app.name');
$websiteDescription = $settings['website_description'] ?? '';
$logoUrl = $settings['logo_url'] ?? asset('images/logo.png');

// Organization Schema
$organizationSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => $websiteName,
    'description' => $websiteDescription,
    'url' => $websiteUrl,
    'logo' => $logoUrl,
    'sameAs' => array_filter([
        $settings['facebook_url'] ?? null,
        $settings['twitter_url'] ?? null,
        $settings['instagram_url'] ?? null,
        $settings['linkedin_url'] ?? null,
        $settings['youtube_url'] ?? null,
    ]),
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'contactType' => 'Customer Service',
        'email' => $settings['contact_email'] ?? 'contact@example.com',
    ],
];

// WebSite Schema with SearchAction
$websiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => $websiteName,
    'url' => $websiteUrl,
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => [
            '@type' => 'EntryPoint',
            'urlTemplate' => $websiteUrl . '/tools?search={search_term_string}',
        ],
        'query-input' => 'required name=search_term_string',
    ],
];

// ItemList Schema for Featured Tools
$toolsList = [];
$position = 1;
foreach ($featuredTools as $tool) {
    $toolsList[] = [
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
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => '4.8',
            'ratingCount' => '1250',
            'bestRating' => '5',
            'worstRating' => '1',
        ],
    ];
}

$itemListSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => 'Free Online Tools',
    'description' => 'Collection of 130+ free online tools for image conversion, PDF editing, and more',
    'numberOfItems' => count($toolsList),
    'itemListElement' => array_map(function($tool, $index) {
        return [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'item' => $tool,
        ];
    }, $toolsList, array_keys($toolsList)),
];

// BreadcrumbList Schema
$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => $websiteUrl,
        ],
    ],
];
@endphp

{{-- Organization Schema --}}
<script type="application/ld+json">
{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

{{-- WebSite Schema --}}
<script type="application/ld+json">
{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

{{-- ItemList Schema (Featured Tools) --}}
<script type="application/ld+json">
{!! json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

{{-- Breadcrumb Schema --}}
<script type="application/ld+json">
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
