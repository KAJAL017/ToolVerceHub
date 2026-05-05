<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $imageTools = BlogCategory::where('slug', 'image-tools')->first();
        $pdfTools = BlogCategory::where('slug', 'pdf-tools')->first();
        $gaming = BlogCategory::where('slug', 'gaming')->first();
        $ecommerce = BlogCategory::where('slug', 'ecommerce')->first();
        $designTools = BlogCategory::where('slug', 'design-tools')->first();

        $blogs = [
            // Featured Blog - Image Tools
            [
                'title' => 'How to Convert PNG to JPG Online Free — Complete 2026 Guide',
                'slug' => 'convert-png-to-jpg-online-free-2026',
                'status' => 'published',
                'is_featured' => true,
                'is_beginner_friendly' => true,
                'category_id' => $imageTools->id,
                'meta_title' => 'Convert PNG to JPG Free Online — 2026 Complete Guide',
                'meta_description' => 'Convert PNG to JPG free in 3 steps using IMGConvertPro. No signup needed. Learn JPG vs PNG differences, quality tips, and batch conversion.',
                'seo_keywords' => 'convert PNG to JPG, PNG to JPG converter, free image converter, compress image online',
                'featured_image_emoji' => '🖼️',
                'author_name' => 'ToolVerse Editorial',
                'author_emoji' => '✍️',
                'published_date' => Carbon::now()->subDays(3),
                'read_time' => 5,
                'tldr_summary' => 'Converting PNG to JPG takes <strong>under 3 seconds</strong> on IMGConvertPro — free, no signup. JPG files are <strong>up to 80% smaller</strong> than PNG, making them ideal for web, email, and e-commerce.',
                'content' => '<p>Converting PNG to JPG takes under 3 seconds on IMGConvertPro — free, no signup. This complete guide covers format differences, quality settings, and pro tips for best compression without visible quality loss.</p>

<h2>What Are PNG and JPG? Key Differences Explained</h2>
<p>PNG is a lossless format — no image data is discarded when saving. Perfect for logos, screenshots, and graphics where pixel-perfect accuracy matters. JPG uses lossy compression — it cleverly discards subtle image data the human eye won\'t notice, resulting in dramatically smaller files.</p>

<h2>5 Real Reasons to Convert PNG to JPG</h2>
<ul>
  <li><strong>Reduce file size for uploads:</strong> Amazon, Shopify, and Etsy have file size limits.</li>
  <li><strong>Faster website loading:</strong> Smaller JPG images improve Google Core Web Vitals.</li>
  <li><strong>Email attachment limits:</strong> Most email providers cap at 10–25MB.</li>
  <li><strong>Social media optimization:</strong> Instagram and Facebook re-compress images anyway.</li>
  <li><strong>Storage space:</strong> JPG cuts storage needs by 60–80%.</li>
</ul>

<h2>How to Convert PNG to JPG</h2>
<ol>
  <li>Go to IMGConvertPro website</li>
  <li>Upload your PNG file</li>
  <li>Click Convert to JPG and download</li>
</ol>',
                'tags' => ['png-to-jpg', 'image-converter', 'free-tools', 'tutorial'],
                'views_count' => 1250,
                
                // Tool Boxes
                'tool_boxes' => [
                    [
                        'emoji' => '🖼️',
                        'title' => 'IMGConvertPro — Best Free Image Converter',
                        'description' => 'Converts PNG to JPG, WEBP, AVIF, GIF — 20+ formats. Also includes image resizer, CSS generators, QR code tool.',
                        'button_text' => '→ Convert PNG to JPG Free',
                        'button_url' => 'https://imgconvertpro.site/',
                        'color' => 'g'
                    ],
                ],
                
                // Steps
                'steps' => [
                    [
                        'number' => 1,
                        'title' => 'Go to IMGConvertPro',
                        'description' => 'Open imgconvertpro.site in any browser — Chrome, Firefox, Safari or Edge. No login needed.'
                    ],
                    [
                        'number' => 2,
                        'title' => 'Upload Your PNG File',
                        'description' => 'Drag and drop your PNG onto the upload area, or click to browse. Multiple files supported.'
                    ],
                    [
                        'number' => 3,
                        'title' => 'Convert and Download',
                        'description' => 'Click Convert to JPG. Processing takes under 2 seconds. Download your JPG directly.'
                    ]
                ],
                
                // Callouts
                'callouts' => [
                    [
                        'type' => 'tip',
                        'icon' => '💡',
                        'content' => '<strong>Tip:</strong> If your PNG has a transparent background, those areas become white when converted to JPG.'
                    ],
                ],
                
                // FAQs
                'faqs' => [
                    [
                        'question' => 'Can I convert PNG to JPG for free?',
                        'answer' => 'Yes! IMGConvertPro converts PNG to JPG completely free, no account needed.'
                    ],
                    [
                        'question' => 'Does PNG to JPG conversion lose quality?',
                        'answer' => 'At 80-90% quality settings the difference is invisible while file size drops 60-80%.'
                    ],
                ],
                
                // Conclusion
                'conclusion_data' => [
                    'title' => 'Ready to Convert Your PNG Files?',
                    'content' => 'Start converting PNG to JPG free on IMGConvertPro — no signup, no limits.',
                    'buttons' => [
                        [
                            'text' => 'Convert PNG to JPG Free',
                            'url' => 'https://imgconvertpro.site/',
                            'color' => 'g'
                        ],
                    ]
                ],
                
                // Sidebar Promos
                'sidebar_promos' => [
                    [
                        'emoji' => '🖼️',
                        'name' => 'IMGConvertPro',
                        'description' => '80+ free image tools',
                        'link_text' => 'Try Free →',
                        'link_url' => 'https://imgconvertpro.site/',
                        'color' => 'g'
                    ],
                    [
                        'emoji' => '📄',
                        'name' => 'SmartPDFs',
                        'description' => '50+ PDF tools',
                        'link_text' => 'Try Free →',
                        'link_url' => 'https://demo.smartpdfs.in/',
                        'color' => 'c'
                    ],
                ],
                
                // Quick Links
                'quick_links' => [
                    ['text' => 'PNG to WEBP', 'url' => '#', 'color' => 'g'],
                    ['text' => 'JPG to PNG', 'url' => '#', 'color' => 'c'],
                ],
            ],

            // PDF Tools Blog
            [
                'title' => 'How to Merge Multiple PDFs Into One File Free',
                'slug' => 'merge-multiple-pdfs-free',
                'status' => 'published',
                'is_featured' => false,
                'is_beginner_friendly' => true,
                'category_id' => $pdfTools->id,
                'meta_title' => 'Merge Multiple PDFs Into One File Free — SmartPDFs Guide',
                'meta_description' => 'Combine PDFs in one click using SmartPDFs. No email, no account needed. Learn how to merge PDF files online for free.',
                'seo_keywords' => 'merge PDF, combine PDF files, PDF merger free, join PDF online',
                'featured_image_emoji' => '📄',
                'author_name' => 'ToolVerse Editorial',
                'author_emoji' => '✍️',
                'published_date' => Carbon::now()->subDays(8),
                'read_time' => 4,
                'tldr_summary' => 'Merge multiple PDFs into one file in <strong>seconds</strong> using SmartPDFs. Completely free, no email required, works in browser.',
                'content' => '<p>Combine PDFs in one click using SmartPDFs. No email, no account needed.</p>

<h2>Why Merge PDF Files?</h2>
<p>Merging PDFs is essential for creating reports, combining invoices, or organizing documents. Instead of sending multiple files, send one clean PDF.</p>

<h2>How to Merge PDFs Online Free</h2>
<ol>
  <li>Open SmartPDFs PDF Merger tool</li>
  <li>Upload multiple PDF files</li>
  <li>Arrange them in order</li>
  <li>Click Merge and download combined PDF</li>
</ol>',
                'tags' => ['pdf-merger', 'free-tools', 'tutorial'],
                'views_count' => 890,
                
                'tool_boxes' => [
                    [
                        'emoji' => '📄',
                        'title' => 'SmartPDFs — Free PDF Merger',
                        'description' => 'Merge, split, convert & compress PDFs — browser-based & private.',
                        'button_text' => '→ Merge PDFs Free',
                        'button_url' => 'https://demo.smartpdfs.in/',
                        'color' => 'c'
                    ],
                ],
                
                'steps' => [
                    ['number' => 1, 'title' => 'Upload PDF Files', 'description' => 'Select multiple PDF files from your computer'],
                    ['number' => 2, 'title' => 'Arrange Order', 'description' => 'Drag and drop to reorder pages'],
                    ['number' => 3, 'title' => 'Merge & Download', 'description' => 'Click merge button and download combined PDF'],
                ],
                
                'callouts' => [
                    ['type' => 'tip', 'icon' => '💡', 'content' => '<strong>Tip:</strong> You can merge up to 20 PDF files at once.'],
                ],
                
                'faqs' => [
                    ['question' => 'Is PDF merging free?', 'answer' => 'Yes! SmartPDFs is completely free with no limits.'],
                    ['question' => 'Is it safe to merge PDFs online?', 'answer' => 'Yes, files are processed in your browser and not uploaded to servers.'],
                ],
                
                'conclusion_data' => [
                    'title' => 'Start Merging PDFs Now',
                    'content' => 'Combine your PDF files instantly with SmartPDFs.',
                    'buttons' => [['text' => 'Merge PDFs Free', 'url' => 'https://demo.smartpdfs.in/', 'color' => 'c']],
                ],
                
                'sidebar_promos' => [
                    ['emoji' => '📄', 'name' => 'SmartPDFs', 'description' => '50+ PDF tools', 'link_text' => 'Try Free →', 'link_url' => 'https://demo.smartpdfs.in/', 'color' => 'c'],
                ],
                
                'quick_links' => [
                    ['text' => 'Split PDF', 'url' => '#', 'color' => 'c'],
                    ['text' => 'Compress PDF', 'url' => '#', 'color' => 'c'],
                ],
            ],

            // Gaming Blog
            [
                'title' => 'Top 20 Free HTML5 Games to Play Without Downloading',
                'slug' => 'top-20-free-html5-games',
                'status' => 'published',
                'is_featured' => false,
                'is_beginner_friendly' => true,
                'category_id' => $gaming->id,
                'meta_title' => 'Top 20 Free HTML5 Games — Play Instantly No Download',
                'meta_description' => 'Best action, puzzle, and racing browser games on ZapGames — play instantly without downloading anything.',
                'seo_keywords' => 'HTML5 games, free browser games, no download games, online games',
                'featured_image_emoji' => '🎮',
                'author_name' => 'Gaming Team',
                'author_emoji' => '🎯',
                'published_date' => Carbon::now()->subDays(13),
                'read_time' => 7,
                'tldr_summary' => 'Play <strong>20+ free HTML5 games</strong> instantly in your browser. No downloads, no plugins needed. Works on desktop, mobile, and tablets.',
                'content' => '<p>Best action, puzzle, and racing browser games on ZapGames — play instantly.</p>

<h2>What Are HTML5 Games?</h2>
<p>HTML5 games run directly in your web browser without plugins or downloads. They work on desktop, mobile, and tablets seamlessly.</p>

<h2>Top 10 Action Games</h2>
<ol>
  <li>Zombie Shooter - Fast-paced survival game</li>
  <li>Space Invaders Redux - Classic arcade action</li>
  <li>Ninja Runner - Parkour platformer</li>
  <li>Tank Battle - Multiplayer combat</li>
  <li>Street Fighter Clone - Fighting game</li>
</ol>

<h2>Top 10 Puzzle Games</h2>
<ol>
  <li>2048 - Number matching puzzle</li>
  <li>Tetris Classic - Block stacking game</li>
  <li>Candy Crush Style - Match-3 puzzle</li>
  <li>Sudoku Master - Logic puzzle</li>
  <li>Mahjong Connect - Tile matching</li>
</ol>',
                'tags' => ['html5-games', 'action-games', 'free-tools'],
                'views_count' => 2100,
                
                'tool_boxes' => [
                    [
                        'emoji' => '🎮',
                        'title' => 'ZapGames — 500+ Free HTML5 Games',
                        'description' => 'Play action, puzzle, racing, and arcade games instantly. No download required.',
                        'button_text' => '→ Play Free Games',
                        'button_url' => 'https://zapgames.fun/',
                        'color' => 'b'
                    ],
                ],
                
                'steps' => [
                    ['number' => 1, 'title' => 'Visit ZapGames', 'description' => 'Open zapgames.fun in any browser'],
                    ['number' => 2, 'title' => 'Choose a Game', 'description' => 'Browse by category or search for your favorite'],
                    ['number' => 3, 'title' => 'Play Instantly', 'description' => 'Click and start playing - no download needed'],
                ],
                
                'callouts' => [
                    ['type' => 'tip', 'icon' => '🎯', 'content' => '<strong>Pro Tip:</strong> HTML5 games work on mobile too! Play on your phone or tablet.'],
                ],
                
                'faqs' => [
                    ['question' => 'Do HTML5 games work on mobile?', 'answer' => 'Yes! HTML5 games work perfectly on smartphones and tablets.'],
                    ['question' => 'Do I need to install anything?', 'answer' => 'No! Games run directly in your browser without any downloads.'],
                ],
                
                'conclusion_data' => [
                    'title' => 'Start Playing Free Games Now',
                    'content' => 'Browse 500+ free HTML5 games on ZapGames and start playing instantly.',
                    'buttons' => [['text' => 'Play Free Games', 'url' => 'https://zapgames.fun/', 'color' => 'b']],
                ],
                
                'sidebar_promos' => [
                    ['emoji' => '🎮', 'name' => 'ZapGames', 'description' => '500+ free games', 'link_text' => 'Play Now →', 'link_url' => 'https://zapgames.fun/', 'color' => 'b'],
                ],
                
                'quick_links' => [
                    ['text' => 'Action Games', 'url' => '#', 'color' => 'b'],
                    ['text' => 'Puzzle Games', 'url' => '#', 'color' => 'b'],
                ],
            ],

            // PDF OCR Blog
            [
                'title' => 'OCR PDF: Extract Text from Scanned Documents Free',
                'slug' => 'ocr-pdf-extract-text-free',
                'status' => 'published',
                'is_featured' => false,
                'is_beginner_friendly' => true,
                'category_id' => $pdfTools->id,
                'meta_title' => 'OCR PDF — Extract Text from Scanned Documents Free',
                'meta_description' => 'Turn any scanned PDF into editable, searchable text using SmartPDFs OCR tool. Free and accurate.',
                'seo_keywords' => 'OCR PDF, extract text from PDF, scanned PDF to text, PDF OCR free',
                'featured_image_emoji' => '🔍',
                'author_name' => 'ToolVerse Editorial',
                'author_emoji' => '✍️',
                'published_date' => Carbon::now()->subDays(18),
                'read_time' => 5,
                'content' => '<p>Turn any scanned PDF into editable, searchable text using SmartPDFs OCR tool.</p>

<h2>What is OCR?</h2>
<p>OCR (Optical Character Recognition) converts images of text into actual editable text. Perfect for scanned documents, photos of receipts, or old PDFs.</p>

<h2>How to Use OCR on PDF</h2>
<ol>
  <li>Upload your scanned PDF to SmartPDFs</li>
  <li>Select OCR tool</li>
  <li>Choose language (English, Spanish, etc.)</li>
  <li>Click Process and download editable PDF</li>
</ol>

<h2>Benefits of OCR PDF</h2>
<ul>
  <li>Make scanned documents searchable</li>
  <li>Edit text in old PDFs</li>
  <li>Copy text from images</li>
  <li>Archive documents digitally</li>
</ul>',
                'tags' => ['ocr-pdf', 'pdf-security', 'free-tools', 'tutorial'],
                'views_count' => 670,
            ],

            // CSS Generator Blog
            [
                'title' => 'How to Generate CSS Animations Online Free',
                'slug' => 'generate-css-animations-free',
                'status' => 'published',
                'is_featured' => false,
                'is_beginner_friendly' => true,
                'category_id' => $designTools->id,
                'meta_title' => 'CSS Animation Generator Free — Create Keyframe Animations',
                'meta_description' => 'Create smooth keyframe animations with live preview. Copy production-ready CSS code instantly.',
                'seo_keywords' => 'CSS animation generator, keyframe animation, CSS generator, web animation',
                'featured_image_emoji' => '🎨',
                'author_name' => 'Design Team',
                'author_emoji' => '🎨',
                'published_date' => Carbon::now()->subDays(22),
                'read_time' => 6,
                'content' => '<p>Create smooth keyframe animations with live preview. Copy production-ready CSS code.</p>

<h2>Why Use CSS Animations?</h2>
<p>CSS animations make websites feel alive and engaging. They improve user experience and make interactions more intuitive.</p>

<h2>How to Generate CSS Animations</h2>
<ol>
  <li>Open IMGConvertPro CSS Animation Generator</li>
  <li>Choose animation type (fade, slide, bounce, etc.)</li>
  <li>Adjust timing and duration</li>
  <li>Preview animation live</li>
  <li>Copy CSS code to your project</li>
</ol>

<h2>Popular Animation Types</h2>
<ul>
  <li><strong>Fade In/Out:</strong> Smooth opacity transitions</li>
  <li><strong>Slide:</strong> Move elements from any direction</li>
  <li><strong>Bounce:</strong> Playful spring effect</li>
  <li><strong>Rotate:</strong> Spin elements smoothly</li>
  <li><strong>Scale:</strong> Grow or shrink elements</li>
</ul>',
                'tags' => ['css-generator', 'free-tools', 'tutorial', 'beginner-guide'],
                'views_count' => 1450,
            ],

            // Password Protect PDF
            [
                'title' => 'How to Password Protect a PDF File Free',
                'slug' => 'password-protect-pdf-free',
                'status' => 'published',
                'is_featured' => false,
                'is_beginner_friendly' => true,
                'category_id' => $pdfTools->id,
                'meta_title' => 'Password Protect PDF Free — Secure Your Documents',
                'meta_description' => 'Add strong password protection to any PDF in seconds. No subscription needed.',
                'seo_keywords' => 'password protect PDF, secure PDF, encrypt PDF, PDF security',
                'featured_image_emoji' => '🔒',
                'author_name' => 'ToolVerse Editorial',
                'author_emoji' => '✍️',
                'published_date' => Carbon::now()->subDays(32),
                'read_time' => 4,
                'content' => '<p>Add strong password protection to any PDF in seconds. No subscription needed.</p>

<h2>Why Password Protect PDFs?</h2>
<p>Protect sensitive documents like contracts, invoices, medical records, or personal information from unauthorized access.</p>

<h2>How to Add Password to PDF</h2>
<ol>
  <li>Upload PDF to SmartPDFs</li>
  <li>Select Password Protection tool</li>
  <li>Enter strong password</li>
  <li>Choose permissions (view only, print, edit)</li>
  <li>Download protected PDF</li>
</ol>

<h2>Password Security Tips</h2>
<ul>
  <li>Use at least 12 characters</li>
  <li>Mix uppercase, lowercase, numbers, symbols</li>
  <li>Avoid common words or dates</li>
  <li>Store passwords securely</li>
</ul>',
                'tags' => ['pdf-security', 'free-tools', 'tutorial'],
                'views_count' => 540,
            ],

            // QR Code Generator
            [
                'title' => 'QR Code Generator Free — Create Custom QR Codes Online',
                'slug' => 'qr-code-generator-free',
                'status' => 'published',
                'is_featured' => false,
                'is_beginner_friendly' => true,
                'category_id' => $imageTools->id,
                'meta_title' => 'Free QR Code Generator — Create Custom QR Codes',
                'meta_description' => 'Generate scannable QR codes from any URL, text, or contact info. Free, instant.',
                'seo_keywords' => 'QR code generator, create QR code, free QR code, custom QR code',
                'featured_image_emoji' => '🎯',
                'author_name' => 'ToolVerse Editorial',
                'author_emoji' => '✍️',
                'published_date' => Carbon::now()->subDays(35),
                'read_time' => 3,
                'content' => '<p>Generate scannable QR codes from any URL, text, or contact info. Free, instant.</p>

<h2>What is a QR Code?</h2>
<p>QR (Quick Response) codes are 2D barcodes that store information like URLs, text, contact details, or WiFi credentials. Scan with any smartphone camera.</p>

<h2>How to Create QR Code</h2>
<ol>
  <li>Open IMGConvertPro QR Code Generator</li>
  <li>Enter URL, text, or contact info</li>
  <li>Customize colors and size (optional)</li>
  <li>Generate and download QR code</li>
</ol>

<h2>QR Code Use Cases</h2>
<ul>
  <li>Business cards - Share contact instantly</li>
  <li>Restaurant menus - Contactless ordering</li>
  <li>Product packaging - Link to instructions</li>
  <li>Event tickets - Quick check-in</li>
  <li>WiFi sharing - Connect without typing password</li>
</ul>',
                'tags' => ['qr-code', 'free-tools', 'tutorial', 'beginner-guide'],
                'views_count' => 980,
            ],

            // WEBP Converter
            [
                'title' => 'How to Convert WEBP to PNG Online Free — Format Guide',
                'slug' => 'convert-webp-to-png-free',
                'status' => 'published',
                'is_featured' => false,
                'is_beginner_friendly' => true,
                'category_id' => $imageTools->id,
                'meta_title' => 'Convert WEBP to PNG Free — Complete Format Guide',
                'meta_description' => 'WEBP is great for web, but sometimes you need PNG. Convert WEBP to PNG instantly using IMGConvertPro.',
                'seo_keywords' => 'WEBP to PNG, convert WEBP, image converter, WEBP format',
                'featured_image_emoji' => '📸',
                'author_name' => 'ToolVerse Editorial',
                'author_emoji' => '✍️',
                'published_date' => Carbon::now()->subDays(38),
                'read_time' => 4,
                'content' => '<p>WEBP is great for web, but sometimes you need PNG. Convert WEBP to PNG instantly using IMGConvertPro.</p>

<h2>What is WEBP Format?</h2>
<p>WEBP is a modern image format developed by Google. It provides superior compression compared to PNG and JPG while maintaining quality.</p>

<h2>Why Convert WEBP to PNG?</h2>
<ul>
  <li>Better compatibility with older software</li>
  <li>Preserve transparency</li>
  <li>Edit in Photoshop or other tools</li>
  <li>Print-ready format</li>
</ul>

<h2>How to Convert WEBP to PNG</h2>
<ol>
  <li>Upload WEBP file to IMGConvertPro</li>
  <li>Select PNG as output format</li>
  <li>Click Convert</li>
  <li>Download PNG file</li>
</ol>',
                'tags' => ['webp-convert', 'image-converter', 'free-tools', 'tutorial'],
                'views_count' => 720,
            ],

            // Amazon Shipping Label
            [
                'title' => 'Amazon Shipping Label Cropper — Format Labels for Thermal Printing Free',
                'slug' => 'amazon-shipping-label-cropper',
                'status' => 'published',
                'is_featured' => false,
                'is_beginner_friendly' => true,
                'category_id' => $ecommerce->id,
                'meta_title' => 'Amazon Shipping Label Cropper — Thermal Printer Format',
                'meta_description' => 'Crop Amazon FBA and FBM shipping labels from PDF for thermal printer (4×6). No software needed.',
                'seo_keywords' => 'Amazon shipping label, thermal printer, label cropper, FBA labels',
                'featured_image_emoji' => '📦',
                'author_name' => 'E-Commerce Team',
                'author_emoji' => '📦',
                'published_date' => Carbon::now()->subDays(42),
                'read_time' => 3,
                'content' => '<p>Crop Amazon FBA and FBM shipping labels from PDF for thermal printer (4×6). No software needed.</p>

<h2>Why Crop Amazon Labels?</h2>
<p>Amazon provides shipping labels in A4 or Letter size PDF. Thermal printers need 4×6 inch labels. This tool crops them perfectly.</p>

<h2>How to Crop Amazon Shipping Labels</h2>
<ol>
  <li>Download shipping label PDF from Amazon Seller Central</li>
  <li>Upload to IMGConvertPro Label Cropper</li>
  <li>Tool automatically detects and crops to 4×6</li>
  <li>Download cropped PDF</li>
  <li>Print on thermal printer</li>
</ol>

<h2>Benefits for Amazon Sellers</h2>
<ul>
  <li>Save time - No manual cropping needed</li>
  <li>Perfect fit for thermal printers</li>
  <li>Works with FBA and FBM labels</li>
  <li>Batch process multiple labels</li>
</ul>',
                'tags' => ['amazon-fba', 'shipping-labels', 'free-tools', 'tutorial'],
                'views_count' => 450,
            ],

            // Action Games Blog
            [
                'title' => 'Best Free Action Games Online 2026 — Play Instantly No Download',
                'slug' => 'best-free-action-games-2026',
                'status' => 'published',
                'is_featured' => false,
                'is_beginner_friendly' => true,
                'category_id' => $gaming->id,
                'meta_title' => 'Best Free Action Games 2026 — Play Instantly',
                'meta_description' => 'Top picks from ZapGames action category: shooting, fighting, and battle games in any browser.',
                'seo_keywords' => 'action games, free games, browser games, online games 2026',
                'featured_image_emoji' => '🏆',
                'author_name' => 'Gaming Team',
                'author_emoji' => '🎯',
                'published_date' => Carbon::now()->subDays(45),
                'read_time' => 6,
                'content' => '<p>Top picks from ZapGames action category: shooting, fighting, and battle games in any browser.</p>

<h2>Top 5 Shooting Games</h2>
<ol>
  <li><strong>Zombie Apocalypse:</strong> Survive waves of zombies</li>
  <li><strong>Space Shooter Pro:</strong> Classic arcade shooter</li>
  <li><strong>Sniper Mission:</strong> Tactical shooting game</li>
  <li><strong>Tank Wars:</strong> Multiplayer tank battles</li>
  <li><strong>Western Gunfight:</strong> Wild west duels</li>
</ol>

<h2>Top 5 Fighting Games</h2>
<ol>
  <li><strong>Street Brawler:</strong> Beat em up action</li>
  <li><strong>Kung Fu Master:</strong> Martial arts combat</li>
  <li><strong>Boxing Champion:</strong> Boxing simulation</li>
  <li><strong>Ninja Warrior:</strong> Stealth action game</li>
  <li><strong>Superhero Battle:</strong> Comic book fighting</li>
</ol>',
                'tags' => ['action-games', 'html5-games', 'free-tools'],
                'views_count' => 1890,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

        $this->command->info('✅ Blogs seeded successfully!');
        $this->command->info('   - ' . count($blogs) . ' blog posts created');
        $this->command->info('   - 1 featured blog');
        $this->command->info('   - ' . (count($blogs) - 1) . ' regular blogs');
    }
}
