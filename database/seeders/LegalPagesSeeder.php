<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class LegalPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Privacy Policy
        Page::create([
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => $this->getPrivacyPolicyContent(),
            'meta_description' => 'Learn how ToolVerse Hub collects, uses, and protects your personal information. Our privacy policy complies with Indian data protection laws.',
            'meta_keywords' => 'privacy policy, data protection, personal information, cookies, Indian law, ToolVerse Hub',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Terms of Service
        Page::create([
            'title' => 'Terms of Service',
            'slug' => 'terms-of-service',
            'content' => $this->getTermsOfServiceContent(),
            'meta_description' => 'Read our terms of service to understand the rules and regulations for using ToolVerse Hub\'s free online tools and services.',
            'meta_keywords' => 'terms of service, user agreement, rules, regulations, online tools, ToolVerse Hub',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Cookie Policy
        Page::create([
            'title' => 'Cookie Policy',
            'slug' => 'cookies-policy',
            'content' => $this->getCookiePolicyContent(),
            'meta_description' => 'Learn about how ToolVerse Hub uses cookies to improve your browsing experience and provide better services.',
            'meta_keywords' => 'cookie policy, cookies, tracking, analytics, website functionality, privacy',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function getPrivacyPolicyContent(): string
    {
        return '
<div class="legal-content">
    <h1>Privacy Policy</h1>
    <p><strong>Last updated:</strong> ' . date('F j, Y') . '</p>
    
    <p>ToolVerse Hub ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services.</p>

    <h2>1. Information We Collect</h2>
    
    <h3>1.1 Information You Provide</h3>
    <ul>
        <li>Contact information (name, email address) when you contact us</li>
        <li>Feedback and comments you provide</li>
        <li>Files you upload for processing (temporarily stored and automatically deleted)</li>
    </ul>

    <h3>1.2 Information Automatically Collected</h3>
    <ul>
        <li>IP address and location data</li>
        <li>Browser type and version</li>
        <li>Device information</li>
        <li>Usage data and analytics</li>
        <li>Cookies and similar tracking technologies</li>
    </ul>

    <h2>2. How We Use Your Information</h2>
    <ul>
        <li>To provide and maintain our services</li>
        <li>To process your files and deliver results</li>
        <li>To improve our website and services</li>
        <li>To respond to your inquiries and support requests</li>
        <li>To analyze usage patterns and optimize performance</li>
        <li>To comply with legal obligations</li>
    </ul>

    <h2>3. Data Storage and Security</h2>
    <p>We implement appropriate security measures to protect your information:</p>
    <ul>
        <li>Files uploaded for processing are automatically deleted within 24 hours</li>
        <li>We use SSL encryption for data transmission</li>
        <li>Access to personal data is restricted to authorized personnel only</li>
        <li>Regular security audits and updates</li>
    </ul>

    <h2>4. Data Sharing and Disclosure</h2>
    <p>We do not sell, trade, or rent your personal information. We may share information only in the following circumstances:</p>
    <ul>
        <li>With your explicit consent</li>
        <li>To comply with legal obligations or court orders</li>
        <li>To protect our rights, property, or safety</li>
        <li>With trusted service providers who assist in operating our website</li>
    </ul>

    <h2>5. Your Rights (Under Indian Law)</h2>
    <p>Under the Information Technology Act, 2000 and other applicable Indian laws, you have the right to:</p>
    <ul>
        <li>Access your personal information</li>
        <li>Correct inaccurate or incomplete data</li>
        <li>Request deletion of your personal data</li>
        <li>Withdraw consent for data processing</li>
        <li>File complaints with appropriate authorities</li>
    </ul>

    <h2>6. Cookies and Tracking</h2>
    <p>We use cookies to enhance your experience. You can control cookie settings through your browser. For detailed information, please see our Cookie Policy.</p>

    <h2>7. Third-Party Services</h2>
    <p>Our website may contain links to third-party websites. We are not responsible for their privacy practices. We may use third-party analytics services like Google Analytics.</p>

    <h2>8. Data Retention</h2>
    <ul>
        <li>Uploaded files: Deleted within 24 hours</li>
        <li>Analytics data: Retained for 26 months</li>
        <li>Contact information: Retained until you request deletion</li>
    </ul>

    <h2>9. Children\'s Privacy</h2>
    <p>Our services are not intended for children under 13. We do not knowingly collect personal information from children under 13.</p>

    <h2>10. Changes to This Policy</h2>
    <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on this page with an updated "Last updated" date.</p>

    <h2>11. Contact Us</h2>
    <p>If you have any questions about this Privacy Policy, please contact us:</p>
    <ul>
        <li>Email: privacy@toolversehub.com</li>
        <li>Address: [Your Business Address], India</li>
    </ul>

    <h2>12. Governing Law</h2>
    <p>This Privacy Policy is governed by the laws of India. Any disputes will be resolved in the courts of [Your City], India.</p>
</div>
        ';
    }

    private function getTermsOfServiceContent(): string
    {
        return '
<div class="legal-content">
    <h1>Terms of Service</h1>
    <p><strong>Last updated:</strong> ' . date('F j, Y') . '</p>
    
    <p>Welcome to ToolVerse Hub. These Terms of Service ("Terms") govern your use of our website and services. By accessing or using our services, you agree to be bound by these Terms.</p>

    <h2>1. Acceptance of Terms</h2>
    <p>By accessing and using ToolVerse Hub, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>

    <h2>2. Description of Service</h2>
    <p>ToolVerse Hub provides free online tools for:</p>
    <ul>
        <li>Image conversion and editing</li>
        <li>PDF manipulation and processing</li>
        <li>File format conversion</li>
        <li>Online games and entertainment</li>
        <li>Other utility tools</li>
    </ul>

    <h2>3. User Responsibilities</h2>
    <p>You agree to:</p>
    <ul>
        <li>Use our services only for lawful purposes</li>
        <li>Not upload malicious, copyrighted, or illegal content</li>
        <li>Not attempt to harm or disrupt our services</li>
        <li>Not use automated tools to access our services excessively</li>
        <li>Respect intellectual property rights</li>
        <li>Comply with all applicable Indian laws and regulations</li>
    </ul>

    <h2>4. Prohibited Uses</h2>
    <p>You may not use our services to:</p>
    <ul>
        <li>Upload or process copyrighted material without permission</li>
        <li>Distribute malware, viruses, or harmful code</li>
        <li>Engage in illegal activities</li>
        <li>Violate privacy rights of others</li>
        <li>Spam or send unsolicited communications</li>
        <li>Attempt to reverse engineer our tools</li>
    </ul>

    <h2>5. Intellectual Property</h2>
    <p>All content, features, and functionality of ToolVerse Hub are owned by us and are protected by Indian and international copyright, trademark, and other intellectual property laws.</p>

    <h2>6. User Content</h2>
    <ul>
        <li>You retain ownership of files you upload</li>
        <li>You grant us temporary license to process your files</li>
        <li>Files are automatically deleted within 24 hours</li>
        <li>You are responsible for the legality of your uploaded content</li>
    </ul>

    <h2>7. Service Availability</h2>
    <ul>
        <li>We strive for 99.9% uptime but cannot guarantee uninterrupted service</li>
        <li>We may temporarily suspend services for maintenance</li>
        <li>We reserve the right to modify or discontinue services</li>
    </ul>

    <h2>8. Disclaimer of Warranties</h2>
    <p>Our services are provided "as is" without warranties of any kind. We do not guarantee:</p>
    <ul>
        <li>Accuracy or quality of processed files</li>
        <li>Uninterrupted or error-free service</li>
        <li>Security of data transmission</li>
        <li>Compatibility with all devices or browsers</li>
    </ul>

    <h2>9. Limitation of Liability</h2>
    <p>To the maximum extent permitted by Indian law, we shall not be liable for:</p>
    <ul>
        <li>Any indirect, incidental, or consequential damages</li>
        <li>Loss of data, profits, or business opportunities</li>
        <li>Damages exceeding ₹1,000 (One Thousand Rupees)</li>
    </ul>

    <h2>10. Indemnification</h2>
    <p>You agree to indemnify and hold us harmless from any claims, damages, or expenses arising from your use of our services or violation of these Terms.</p>

    <h2>11. Privacy</h2>
    <p>Your privacy is important to us. Please review our Privacy Policy to understand how we collect, use, and protect your information.</p>

    <h2>12. Modifications to Terms</h2>
    <p>We reserve the right to modify these Terms at any time. Changes will be effective immediately upon posting. Your continued use constitutes acceptance of modified Terms.</p>

    <h2>13. Termination</h2>
    <p>We may terminate or suspend your access to our services immediately, without prior notice, for any breach of these Terms.</p>

    <h2>14. Governing Law and Jurisdiction</h2>
    <p>These Terms are governed by the laws of India. Any disputes shall be resolved in the courts of [Your City], India.</p>

    <h2>15. Severability</h2>
    <p>If any provision of these Terms is found to be unenforceable, the remaining provisions will remain in full force and effect.</p>

    <h2>16. Contact Information</h2>
    <p>For questions about these Terms, please contact us:</p>
    <ul>
        <li>Email: legal@toolversehub.com</li>
        <li>Address: [Your Business Address], India</li>
    </ul>

    <h2>17. Entire Agreement</h2>
    <p>These Terms constitute the entire agreement between you and ToolVerse Hub regarding the use of our services.</p>
</div>
        ';
    }

    private function getCookiePolicyContent(): string
    {
        return '
<div class="legal-content">
    <h1>Cookie Policy</h1>
    <p><strong>Last updated:</strong> ' . date('F j, Y') . '</p>
    
    <p>This Cookie Policy explains how ToolVerse Hub uses cookies and similar technologies when you visit our website. It explains what these technologies are and why we use them, as well as your rights to control our use of them.</p>

    <h2>1. What Are Cookies?</h2>
    <p>Cookies are small text files that are stored on your device when you visit a website. They are widely used to make websites work more efficiently and provide information to website owners.</p>

    <h2>2. Types of Cookies We Use</h2>
    
    <h3>2.1 Essential Cookies</h3>
    <p>These cookies are necessary for the website to function properly:</p>
    <ul>
        <li>Session management</li>
        <li>Security features</li>
        <li>Load balancing</li>
        <li>Basic functionality</li>
    </ul>

    <h3>2.2 Analytics Cookies</h3>
    <p>We use analytics cookies to understand how visitors interact with our website:</p>
    <ul>
        <li>Google Analytics (anonymized data)</li>
        <li>Page views and user behavior</li>
        <li>Performance monitoring</li>
        <li>Error tracking</li>
    </ul>

    <h3>2.3 Functional Cookies</h3>
    <p>These cookies enhance your experience:</p>
    <ul>
        <li>Language preferences</li>
        <li>Theme settings</li>
        <li>Recently used tools</li>
        <li>User preferences</li>
    </ul>

    <h3>2.4 Performance Cookies</h3>
    <p>These cookies help us improve our website performance:</p>
    <ul>
        <li>Loading speed optimization</li>
        <li>Error monitoring</li>
        <li>Feature usage tracking</li>
        <li>System performance metrics</li>
    </ul>

    <h2>3. Third-Party Cookies</h2>
    <p>We may use third-party services that set cookies:</p>
    <ul>
        <li><strong>Google Analytics:</strong> For website analytics and insights</li>
        <li><strong>CDN Services:</strong> For faster content delivery</li>
        <li><strong>Security Services:</strong> For protection against threats</li>
    </ul>

    <h2>4. How Long Do Cookies Last?</h2>
    <ul>
        <li><strong>Session Cookies:</strong> Deleted when you close your browser</li>
        <li><strong>Persistent Cookies:</strong> Remain for a set period (up to 2 years)</li>
        <li><strong>Analytics Cookies:</strong> Typically last 26 months</li>
        <li><strong>Functional Cookies:</strong> Usually last 1 year</li>
    </ul>

    <h2>5. Why We Use Cookies</h2>
    <p>We use cookies for the following purposes:</p>
    <ul>
        <li>To provide essential website functionality</li>
        <li>To improve user experience and performance</li>
        <li>To analyze website usage and optimize content</li>
        <li>To remember your preferences and settings</li>
        <li>To ensure website security</li>
        <li>To comply with legal requirements</li>
    </ul>

    <h2>6. Your Cookie Choices</h2>
    
    <h3>6.1 Browser Settings</h3>
    <p>You can control cookies through your browser settings:</p>
    <ul>
        <li>Block all cookies</li>
        <li>Block third-party cookies only</li>
        <li>Delete existing cookies</li>
        <li>Receive notifications when cookies are set</li>
    </ul>

    <h3>6.2 Opt-Out Options</h3>
    <ul>
        <li><strong>Google Analytics:</strong> <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">Google Analytics Opt-out</a></li>
        <li><strong>Browser Extensions:</strong> Use privacy-focused browser extensions</li>
        <li><strong>Do Not Track:</strong> Enable Do Not Track in your browser</li>
    </ul>

    <h2>7. Impact of Disabling Cookies</h2>
    <p>If you disable cookies, some features may not work properly:</p>
    <ul>
        <li>User preferences may not be saved</li>
        <li>Some tools may not function correctly</li>
        <li>Website performance may be affected</li>
        <li>Analytics and improvements may be limited</li>
    </ul>

    <h2>8. Mobile Devices</h2>
    <p>Mobile browsers also support cookie controls:</p>
    <ul>
        <li>Check your mobile browser settings</li>
        <li>Use privacy modes when available</li>
        <li>Consider privacy-focused mobile browsers</li>
    </ul>

    <h2>9. Updates to This Policy</h2>
    <p>We may update this Cookie Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons.</p>

    <h2>10. Compliance with Indian Laws</h2>
    <p>This Cookie Policy complies with:</p>
    <ul>
        <li>Information Technology Act, 2000</li>
        <li>Information Technology (Reasonable Security Practices) Rules, 2011</li>
        <li>Other applicable Indian privacy regulations</li>
    </ul>

    <h2>11. Contact Us</h2>
    <p>If you have any questions about our use of cookies, please contact us:</p>
    <ul>
        <li>Email: privacy@toolversehub.com</li>
        <li>Address: [Your Business Address], India</li>
    </ul>

    <h2>12. Consent</h2>
    <p>By continuing to use our website, you consent to our use of cookies as described in this policy. You can withdraw your consent at any time by adjusting your browser settings.</p>
</div>
        ';
    }
}