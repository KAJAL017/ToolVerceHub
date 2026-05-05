<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing FAQs
        Faq::truncate();

        $faqs = [
            // General Questions
            [
                'category' => 'general',
                'question' => 'What is ToolVerse Hub?',
                'answer' => 'ToolVerse Hub is a free online platform offering 130+ professional tools for image conversion, PDF editing, text manipulation, color tools, and more. We also provide 500+ free HTML5 games. Everything is completely free, with no signup required.',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'general',
                'question' => 'Do I need to create an account to use the tools?',
                'answer' => 'No! All our tools are completely free and require no signup or registration. Simply visit the tool you need and start using it immediately in your browser.',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'general',
                'question' => 'Is ToolVerse Hub really free?',
                'answer' => 'Yes, 100% free! We believe powerful tools should be accessible to everyone. There are no hidden costs, no subscriptions, and no paywalls. All features are free forever.',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'general',
                'question' => 'How do you make money if everything is free?',
                'answer' => 'We display non-intrusive advertisements on our platform to cover hosting and development costs. This allows us to keep all tools free for everyone while maintaining and improving our services.',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'general',
                'question' => 'Can I use ToolVerse Hub on mobile devices?',
                'answer' => 'Absolutely! Our platform is fully responsive and works seamlessly on desktop, tablet, and mobile devices. All tools are optimized for touch interfaces and smaller screens.',
                'display_order' => 5,
                'is_active' => true,
            ],

            // Tools & Features
            [
                'category' => 'tools',
                'question' => 'What types of tools are available?',
                'answer' => 'We offer tools across multiple categories: Image Tools (conversion, compression, resizing), PDF Tools (merge, split, compress), Text Tools (case converter, word counter), Color Tools (picker, converter), Code Tools (formatters, minifiers), Generator Tools, SEO Tools, and Security Tools.',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'tools',
                'question' => 'Are the tools safe to use?',
                'answer' => 'Yes! All file processing happens locally in your browser using client-side JavaScript. Your files never leave your device and are not uploaded to our servers. We prioritize your privacy and data security.',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'tools',
                'question' => 'What file formats do you support?',
                'answer' => 'We support 20+ image formats (PNG, JPG, WEBP, GIF, SVG, ICO, BMP, TIFF, etc.), all major PDF operations, and various text and code formats. Each tool page lists its specific supported formats.',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'tools',
                'question' => 'Is there a file size limit?',
                'answer' => 'Most tools can handle files up to 50MB. For larger files, processing may take longer depending on your device\'s capabilities. Since processing happens in your browser, the limit depends on your device\'s memory and processing power.',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'tools',
                'question' => 'Can I use the tools offline?',
                'answer' => 'While you need an internet connection to access the website initially, many of our tools work offline once loaded since they process files locally in your browser. However, we recommend using them online for the best experience.',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'category' => 'tools',
                'question' => 'How do I convert images between formats?',
                'answer' => 'Simply select the image conversion tool, upload your image, choose your desired output format, and click convert. The converted image will be ready for download in seconds. No quality loss with our advanced conversion algorithms.',
                'display_order' => 6,
                'is_active' => true,
            ],
            [
                'category' => 'tools',
                'question' => 'Can I batch process multiple files?',
                'answer' => 'Yes! Many of our tools support batch processing, allowing you to convert, compress, or edit multiple files at once. Look for the "Add Multiple Files" option on the tool page.',
                'display_order' => 7,
                'is_active' => true,
            ],

            // Games
            [
                'category' => 'games',
                'question' => 'What types of games are available?',
                'answer' => 'We offer 500+ free HTML5 games across multiple genres: Action, Puzzle, Racing, Sports, Adventure, Strategy, Arcade, and more. All games run directly in your browser with no downloads required.',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'games',
                'question' => 'Do I need to download games?',
                'answer' => 'No downloads needed! All our games are HTML5-based and run directly in your web browser. Just click and play instantly on any device.',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'games',
                'question' => 'Are the games free to play?',
                'answer' => 'Yes, all 500+ games are completely free to play with no in-app purchases or hidden costs. Enjoy unlimited gaming without spending a penny.',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'games',
                'question' => 'Can I play games on mobile?',
                'answer' => 'Absolutely! All our HTML5 games are mobile-friendly and work perfectly on smartphones and tablets. Touch controls are fully supported for an optimal mobile gaming experience.',
                'display_order' => 4,
                'is_active' => true,
            ],

            // Account & Support
            [
                'category' => 'account',
                'question' => 'How do I report a bug or issue?',
                'answer' => 'If you encounter any bugs or issues, please contact us through our Contact page. Provide details about the problem, including which tool you were using, your browser, and device. We\'ll investigate and fix it as soon as possible.',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'account',
                'question' => 'Can I request a new tool or feature?',
                'answer' => 'Yes! We love hearing from our users. Submit your feature requests through our Contact page. We regularly add new tools based on user feedback and demand.',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'account',
                'question' => 'How can I contact support?',
                'answer' => 'You can reach our support team through the Contact page. We typically respond within 24 hours during business days. For urgent technical issues, please email our support team directly.',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'account',
                'question' => 'Do you store my files or data?',
                'answer' => 'No! We prioritize your privacy. All file processing happens locally in your browser. Your files are never uploaded to our servers, and we don\'t store any of your data. Once you close the browser, everything is deleted.',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'account',
                'question' => 'Can I use ToolVerse Hub for commercial purposes?',
                'answer' => 'Yes! You can use our tools for both personal and commercial projects. There are no restrictions on commercial use. However, please don\'t redistribute or resell our tools as your own.',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'category' => 'account',
                'question' => 'Which browsers are supported?',
                'answer' => 'ToolVerse Hub works on all modern browsers including Chrome, Firefox, Safari, Edge, and Opera. We recommend using the latest version of your browser for the best experience and performance.',
                'display_order' => 6,
                'is_active' => true,
            ],
            [
                'category' => 'account',
                'question' => 'How often do you add new tools?',
                'answer' => 'We regularly update our platform with new tools and features based on user feedback and emerging needs. Follow our blog or social media to stay updated on new releases and improvements.',
                'display_order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        $this->command->info('✅ FAQs seeded successfully! Total: ' . count($faqs) . ' FAQs');
    }
}
