{{-- 
  TASK 5: Article + HowTo Schema for Blog Posts
  
  This generates structured data for:
  - Article schema (for Google Discover, News)
  - HowTo schema (for step-by-step rich results)
  - FAQPage schema (for FAQ rich snippets)
--}}

@php
$websiteUrl = $settings['website_url'] ?? config('app.url');
$websiteName = $settings['website_name'] ?? config('app.name');
$logoUrl = $settings['logo_url'] ?? asset('images/logo.png');

// Article Schema
$articleSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $blog->title,
    'description' => $blog->meta_description ?? strip_tags($blog->tldr_summary ?? ''),
    'image' => $blog->featured_image ? asset('storage/' . $blog->featured_image) : $logoUrl,
    'datePublished' => $blog->published_date->toIso8601String(),
    'dateModified' => $blog->updated_date ? $blog->updated_date->toIso8601String() : $blog->published_date->toIso8601String(),
    'author' => [
        '@type' => 'Person',
        'name' => $blog->author_name ?? 'Editorial Team',
        'url' => $websiteUrl,
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => $websiteName,
        'logo' => [
            '@type' => 'ImageObject',
            'url' => $logoUrl,
        ],
    ],
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => url()->current(),
    ],
];

// Add keywords if available
if ($blog->seo_keywords) {
    $articleSchema['keywords'] = $blog->seo_keywords;
}

// Add word count
$wordCount = str_word_count(strip_tags($blog->content));
$articleSchema['wordCount'] = $wordCount;

// Add time required (read time)
if ($blog->read_time) {
    $articleSchema['timeRequired'] = 'PT' . $blog->read_time . 'M';
}

// HowTo Schema (if steps exist)
$howToSchema = null;
if ($blog->steps && count($blog->steps) > 0) {
    $steps = [];
    foreach ($blog->steps as $step) {
        $stepData = [
            '@type' => 'HowToStep',
            'name' => $step['title'] ?? '',
            'text' => $step['description'] ?? '',
            'position' => $step['step_number'] ?? count($steps) + 1,
        ];
        
        // Add image if available
        if (!empty($step['image'])) {
            $stepData['image'] = asset('storage/' . $step['image']);
        }
        
        // Add tips as itemListElement
        if (!empty($step['tips']) && is_array($step['tips'])) {
            $stepData['itemListElement'] = array_map(function($tip, $index) {
                return [
                    '@type' => 'HowToTip',
                    'text' => $tip,
                    'position' => $index + 1,
                ];
            }, $step['tips'], array_keys($step['tips']));
        }
        
        $steps[] = $stepData;
    }
    
    $howToSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'HowTo',
        'name' => $blog->title,
        'description' => $blog->meta_description ?? strip_tags($blog->tldr_summary ?? ''),
        'image' => $blog->featured_image ? asset('storage/' . $blog->featured_image) : $logoUrl,
        'totalTime' => $blog->read_time ? 'PT' . $blog->read_time . 'M' : 'PT5M',
        'step' => $steps,
    ];
    
    // Add estimated cost (free)
    $howToSchema['estimatedCost'] = [
        '@type' => 'MonetaryAmount',
        'currency' => 'USD',
        'value' => '0',
    ];
    
    // Add supply (no tools needed)
    $howToSchema['supply'] = [
        '@type' => 'HowToSupply',
        'name' => 'Web Browser',
    ];
    
    // Add tool (online converter)
    $howToSchema['tool'] = [
        '@type' => 'HowToTool',
        'name' => 'Online Converter',
    ];
}

// FAQPage Schema (if FAQs exist)
$faqSchema = null;
if ($blog->faqs && count($blog->faqs) > 0) {
    $questions = [];
    foreach ($blog->faqs as $faq) {
        $questions[] = [
            '@type' => 'Question',
            'name' => $faq['question'] ?? '',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['answer'] ?? '',
            ],
        ];
    }
    
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $questions,
    ];
}

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
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Blog',
            'item' => route('blog'),
        ],
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $blog->category->name ?? 'Article',
            'item' => route('blog', ['category' => $blog->category->slug ?? '']),
        ],
        [
            '@type' => 'ListItem',
            'position' => 4,
            'name' => $blog->title,
            'item' => url()->current(),
        ],
    ],
];
@endphp

{{-- Article Schema --}}
<script type="application/ld+json">
{!! json_encode($articleSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

{{-- HowTo Schema (if applicable) --}}
@if($howToSchema)
<script type="application/ld+json">
{!! json_encode($howToSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endif

{{-- FAQ Schema (if applicable) --}}
@if($faqSchema)
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endif

{{-- Breadcrumb Schema --}}
<script type="application/ld+json">
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
