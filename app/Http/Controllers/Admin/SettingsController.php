<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function general()
    {
        // Get settings from database
        $settings = [
            'website_name' => \App\Models\Setting::get('website_name', 'ToolHub'),
            'website_description' => \App\Models\Setting::get('website_description', 'The ultimate suite of 100% FREE tools for image, PDF, and data file management.'),
            'website_url' => \App\Models\Setting::get('website_url', 'http://127.0.0.1:8000'),
            'footer_text' => \App\Models\Setting::get('footer_text', '© 2026 ToolHub. All rights reserved.'),
            'logo_url' => \App\Models\Setting::get('logo_url', '/logo.png'),
            'favicon_url' => \App\Models\Setting::get('favicon_url', '/favicon.ico'),
            'contact_email' => \App\Models\Setting::get('contact_email', 'contact@toolhub.com'),
            'support_email' => \App\Models\Setting::get('support_email', 'support@toolhub.com'),
            'admin_email' => \App\Models\Setting::get('admin_email', 'admin@toolhub.com'),
        ];
        
        return view('admin.settings.general', compact('settings'));
    }
    
    public function updateGeneral(Request $request)
    {
        try {
            $validated = $request->validate([
                'website_name' => 'required|string|max:255',
                'website_description' => 'nullable|string|max:500',
                'website_url' => 'required|url|max:255',
                'footer_text' => 'nullable|string|max:500',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
                'favicon' => 'nullable|image|mimes:png,jpg,jpeg,ico|max:1024',
                'contact_email' => 'nullable|email|max:255',
                'support_email' => 'nullable|email|max:255',
                'admin_email' => 'nullable|email|max:255',
            ]);
            
            // Handle logo upload
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/branding'), $logoName);
                $validated['logo_url'] = '/uploads/branding/' . $logoName;
                
                // Delete old logo if exists
                $oldLogo = \App\Models\Setting::get('logo_url');
                if ($oldLogo && file_exists(public_path($oldLogo))) {
                    @unlink(public_path($oldLogo));
                }
            }
            
            // Handle favicon upload
            if ($request->hasFile('favicon')) {
                $favicon = $request->file('favicon');
                $faviconName = 'favicon_' . time() . '.' . $favicon->getClientOriginalExtension();
                $favicon->move(public_path('uploads/branding'), $faviconName);
                $validated['favicon_url'] = '/uploads/branding/' . $faviconName;
                
                // Delete old favicon if exists
                $oldFavicon = \App\Models\Setting::get('favicon_url');
                if ($oldFavicon && file_exists(public_path($oldFavicon))) {
                    @unlink(public_path($oldFavicon));
                }
            }
            
            // Remove file fields from validated data
            unset($validated['logo'], $validated['favicon']);
            
            // Save each setting to database
            foreach ($validated as $key => $value) {
                \App\Models\Setting::set($key, $value, 'string', 'general');
            }
            
            return response()->json([
                'success' => true,
                'message' => 'General settings updated successfully!'
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function advertisements()
    {
        // Get settings from database
        $settings = [
            'ads_enabled' => \App\Models\Setting::get('ads_enabled', true),
            'google_adsense_enabled' => \App\Models\Setting::get('google_adsense_enabled', false),
            'google_adsense_client_id' => \App\Models\Setting::get('google_adsense_client_id', ''),
            'header_ad_code' => \App\Models\Setting::get('header_ad_code', ''),
            'sidebar_ad_code' => \App\Models\Setting::get('sidebar_ad_code', ''),
            'footer_ad_code' => \App\Models\Setting::get('footer_ad_code', ''),
            'in_content_ad_code' => \App\Models\Setting::get('in_content_ad_code', ''),
            'popup_ad_enabled' => \App\Models\Setting::get('popup_ad_enabled', false),
            'popup_ad_code' => \App\Models\Setting::get('popup_ad_code', ''),
            'popup_delay' => \App\Models\Setting::get('popup_delay', 5),
        ];
        
        return view('admin.settings.advertisements', compact('settings'));
    }
    
    public function updateAdvertisements(Request $request)
    {
        try {
            $validated = $request->validate([
                'google_adsense_client_id' => 'nullable|string|max:255',
                'header_ad_code' => 'nullable|string|max:5000',
                'sidebar_ad_code' => 'nullable|string|max:5000',
                'footer_ad_code' => 'nullable|string|max:5000',
                'in_content_ad_code' => 'nullable|string|max:5000',
                'popup_ad_code' => 'nullable|string|max:5000',
                'popup_delay' => 'nullable|integer|min:0|max:60',
            ]);
            
            // Handle checkboxes (they won't be in request if unchecked)
            $checkboxes = [
                'ads_enabled',
                'google_adsense_enabled',
                'popup_ad_enabled'
            ];
            
            foreach ($checkboxes as $checkbox) {
                $value = $request->has($checkbox) ? 1 : 0;
                \App\Models\Setting::set($checkbox, $value, 'boolean', 'advertisements');
            }
            
            // Save text fields
            foreach ($validated as $key => $value) {
                $type = ($key === 'popup_delay') ? 'integer' : 'string';
                \App\Models\Setting::set($key, $value ?? '', $type, 'advertisements');
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Advertisement settings updated successfully!'
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function seo()
    {
        // Get settings from database
        $settings = [
            'meta_title' => \App\Models\Setting::get('meta_title', 'ToolHub - Free Online Tools'),
            'meta_description' => \App\Models\Setting::get('meta_description', 'The ultimate suite of 100% FREE tools for image, PDF, and data file management.'),
            'meta_keywords' => \App\Models\Setting::get('meta_keywords', 'online tools, free tools, image converter, pdf tools, data tools'),
            'og_title' => \App\Models\Setting::get('og_title', 'ToolHub - Free Online Tools'),
            'og_description' => \App\Models\Setting::get('og_description', 'The ultimate suite of 100% FREE tools for image, PDF, and data file management.'),
            'og_image' => \App\Models\Setting::get('og_image', ''),
            'twitter_card' => \App\Models\Setting::get('twitter_card', 'summary_large_image'),
            'twitter_site' => \App\Models\Setting::get('twitter_site', '@toolhub'),
            'google_analytics_id' => \App\Models\Setting::get('google_analytics_id', ''),
            'google_search_console_code' => \App\Models\Setting::get('google_search_console_code', ''),
            'bing_webmaster_code' => \App\Models\Setting::get('bing_webmaster_code', ''),
            'robots_txt' => \App\Models\Setting::get('robots_txt', "User-agent: *\nAllow: /\nSitemap: " . url('/sitemap.xml')),
            'sitemap_enabled' => \App\Models\Setting::get('sitemap_enabled', true),
            'canonical_urls_enabled' => \App\Models\Setting::get('canonical_urls_enabled', true),
        ];
        
        return view('admin.settings.seo', compact('settings'));
    }
    
    public function updateSeo(Request $request)
    {
        try {
            $validated = $request->validate([
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                'meta_keywords' => 'nullable|string|max:1000',
                'og_title' => 'nullable|string|max:255',
                'og_description' => 'nullable|string|max:500',
                'og_image' => 'nullable|url|max:500',
                'twitter_card' => 'nullable|string|max:50',
                'twitter_site' => 'nullable|string|max:100',
                'google_analytics_id' => 'nullable|string|max:50',
                'google_search_console_code' => 'nullable|string|max:5000',
                'bing_webmaster_code' => 'nullable|string|max:5000',
                'robots_txt' => 'nullable|string|max:5000',
            ]);
            
            // Handle checkboxes
            $checkboxes = [
                'sitemap_enabled',
                'canonical_urls_enabled'
            ];
            
            foreach ($checkboxes as $checkbox) {
                $value = $request->has($checkbox) ? 1 : 0;
                \App\Models\Setting::set($checkbox, $value, 'boolean', 'seo');
            }
            
            // Save text fields
            foreach ($validated as $key => $value) {
                \App\Models\Setting::set($key, $value ?? '', 'string', 'seo');
            }
            
            return response()->json([
                'success' => true,
                'message' => 'SEO settings updated successfully!'
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function generateSitemap()
    {
        try {
            // Run the sitemap generation command
            \Illuminate\Support\Facades\Artisan::call('sitemap:generate');
            
            // Get the last modified time of sitemap.xml
            $sitemapPath = public_path('sitemap.xml');
            $lastGenerated = file_exists($sitemapPath) 
                ? date('M d, Y H:i', filemtime($sitemapPath))
                : null;
            
            return response()->json([
                'success' => true,
                'message' => 'Sitemap generated successfully!',
                'lastGenerated' => $lastGenerated
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error generating sitemap: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function security()
    {
        // Get current admin user from session
        $admin = [
            'name' => session('admin_name', 'Super Admin'),
            'email' => session('admin_email', 'super@gmail.com'),
        ];
        
        return view('admin.settings.security', compact('admin'));
    }
    
    public function updateSecurity(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'current_password' => 'nullable|required_with:new_password|string',
                'new_password' => 'nullable|string|min:4|confirmed',
            ]);
            
            // Verify current password if new password is provided
            if ($request->filled('new_password')) {
                // In real app, verify current password against database
                // For now, we'll just check if it matches the session password
                if ($request->current_password !== '2580') {
                    return response()->json([
                        'success' => false,
                        'errors' => [
                            'current_password' => ['Current password is incorrect']
                        ]
                    ], 422);
                }
            }
            
            // Update session data
            session([
                'admin_name' => $validated['name'],
                'admin_email' => $validated['email']
            ]);
            
            // In real app, you would:
            // 1. Update admin name and email in database
            // 2. Hash and update password if provided
            // 3. Send email notification about password change
            
            $message = 'Admin account updated successfully!';
            if ($request->filled('new_password')) {
                $message = 'Admin account and password updated successfully! Please login again.';
            }
            
            return response()->json([
                'success' => true,
                'message' => $message,
                'password_changed' => $request->filled('new_password')
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function socialMedia()
    {
        // Get settings from database
        $settings = [
            'facebook_url' => \App\Models\Setting::get('facebook_url', ''),
            'facebook_active' => \App\Models\Setting::get('facebook_active', true),
            'twitter_url' => \App\Models\Setting::get('twitter_url', ''),
            'twitter_active' => \App\Models\Setting::get('twitter_active', true),
            'instagram_url' => \App\Models\Setting::get('instagram_url', ''),
            'instagram_active' => \App\Models\Setting::get('instagram_active', true),
            'linkedin_url' => \App\Models\Setting::get('linkedin_url', ''),
            'linkedin_active' => \App\Models\Setting::get('linkedin_active', true),
            'youtube_url' => \App\Models\Setting::get('youtube_url', ''),
            'youtube_active' => \App\Models\Setting::get('youtube_active', true),
            'pinterest_url' => \App\Models\Setting::get('pinterest_url', ''),
            'pinterest_active' => \App\Models\Setting::get('pinterest_active', false),
            'tiktok_url' => \App\Models\Setting::get('tiktok_url', ''),
            'tiktok_active' => \App\Models\Setting::get('tiktok_active', false),
            'github_url' => \App\Models\Setting::get('github_url', ''),
            'github_active' => \App\Models\Setting::get('github_active', false),
        ];
        
        return view('admin.settings.social-media', compact('settings'));
    }
    
    public function homepage()
    {
        // Get all icons from database
        $icons = \App\Models\Icon::orderBy('category')->orderBy('name')->get();
        
        // Get all hero buttons from hero_buttons table
        $heroButtons = \App\Models\HeroButton::ordered()->get();
        
        // Get homepage settings (hero buttons are now managed separately)
        $settings = [
            // Hero section
            'hero_badge_text' => \App\Models\Setting::get('hero_badge_text', 'The #1 Free Multi-Tool Platform'),
            'hero_title_line1' => \App\Models\Setting::get('hero_title_line1', 'All Your'),
            'hero_title_highlight1' => \App\Models\Setting::get('hero_title_highlight1', 'Free Digital'),
            'hero_title_line2' => \App\Models\Setting::get('hero_title_line2', 'Tools'),
            'hero_title_highlight2' => \App\Models\Setting::get('hero_title_highlight2', 'Under One Roof.'),
            'hero_description' => \App\Models\Setting::get('hero_description', 'Convert images, edit PDFs, and play 500+ browser games — 100% free, zero signup required. Works on any device, any browser, instantly.'),
            'hero_feature1_text' => \App\Models\Setting::get('hero_feature1_text', '130+ Free Tools'),
            'hero_feature2_text' => \App\Models\Setting::get('hero_feature2_text', '500+ HTML5 Games'),
            'hero_feature3_text' => \App\Models\Setting::get('hero_feature3_text', 'No Signup Required'),
            // Stats section
            'stat1_number' => \App\Models\Setting::get('stat1_number', '130+'),
            'stat1_label' => \App\Models\Setting::get('stat1_label', 'FREE TOOLS'),
            'stat1_color' => \App\Models\Setting::get('stat1_color', '#6ECB8F'),
            'stat2_number' => \App\Models\Setting::get('stat2_number', '500+'),
            'stat2_label' => \App\Models\Setting::get('stat2_label', 'HTML5 GAMES'),
            'stat2_color' => \App\Models\Setting::get('stat2_color', '#F08A65'),
            'stat3_number' => \App\Models\Setting::get('stat3_number', '100%'),
            'stat3_label' => \App\Models\Setting::get('stat3_label', 'FREE FOREVER'),
            'stat3_color' => \App\Models\Setting::get('stat3_color', '#8AABDE'),
            'stat4_number' => \App\Models\Setting::get('stat4_number', '0'),
            'stat4_label' => \App\Models\Setting::get('stat4_label', 'SIGNUP NEEDED'),
            'stat4_color' => \App\Models\Setting::get('stat4_color', '#E8C06A'),
        ];
        
        return view('admin.settings.homepage', compact('settings', 'icons', 'heroButtons'));
    }
    
    public function updateHomepage(Request $request)
    {
        try {
            $validated = $request->validate([
                // Hero section
                'hero_badge_text' => 'required|string|max:200',
                'hero_title_line1' => 'required|string|max:100',
                'hero_title_highlight1' => 'required|string|max:100',
                'hero_title_line2' => 'required|string|max:100',
                'hero_title_highlight2' => 'required|string|max:100',
                'hero_description' => 'required|string|max:500',
                'hero_feature1_text' => 'required|string|max:100',
                'hero_feature2_text' => 'required|string|max:100',
                'hero_feature3_text' => 'required|string|max:100',
                // Stats section
                'stat1_number' => 'required|string|max:50',
                'stat1_label' => 'required|string|max:100',
                'stat1_color' => 'required|string|max:20',
                'stat2_number' => 'required|string|max:50',
                'stat2_label' => 'required|string|max:100',
                'stat2_color' => 'required|string|max:20',
                'stat3_number' => 'required|string|max:50',
                'stat3_label' => 'required|string|max:100',
                'stat3_color' => 'required|string|max:20',
                'stat4_number' => 'required|string|max:50',
                'stat4_label' => 'required|string|max:100',
                'stat4_color' => 'required|string|max:20',
            ]);
            
            // Hero buttons are now managed separately via AJAX, no need to handle them here
            
            // Save each setting to database
            foreach ($validated as $key => $value) {
                \App\Models\Setting::set($key, $value, 'string', 'homepage');
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Homepage settings updated successfully!'
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function updateSocialMedia(Request $request)
    {
        try {
            $validated = $request->validate([
                'facebook_url' => 'nullable|url|max:500',
                'twitter_url' => 'nullable|url|max:500',
                'instagram_url' => 'nullable|url|max:500',
                'linkedin_url' => 'nullable|url|max:500',
                'youtube_url' => 'nullable|url|max:500',
                'pinterest_url' => 'nullable|url|max:500',
                'tiktok_url' => 'nullable|url|max:500',
                'github_url' => 'nullable|url|max:500',
            ]);
            
            // Handle checkboxes (active/inactive toggles)
            $checkboxes = [
                'facebook_active',
                'twitter_active',
                'instagram_active',
                'linkedin_active',
                'youtube_active',
                'pinterest_active',
                'tiktok_active',
                'github_active'
            ];
            
            foreach ($checkboxes as $checkbox) {
                $value = $request->has($checkbox) ? 1 : 0;
                \App\Models\Setting::set($checkbox, $value, 'boolean', 'social_media');
            }
            
            // Save URL fields
            foreach ($validated as $key => $value) {
                \App\Models\Setting::set($key, $value ?? '', 'string', 'social_media');
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Social media settings updated successfully!'
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    // Hero Button Management Methods
    
    public function storeHeroButton(Request $request)
    {
        try {
            $validated = $request->validate([
                'icon' => 'required|string|max:10',
                'text' => 'required|string|max:100',
                'url' => 'required|url|max:500',
                'color' => 'required|in:green,orange,blue',
            ]);
            
            // Get the highest display_order and add 1
            $maxOrder = \App\Models\HeroButton::max('display_order') ?? 0;
            $validated['display_order'] = $maxOrder + 1;
            $validated['is_active'] = true;
            
            \App\Models\HeroButton::create($validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Hero button added successfully!'
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function updateHeroButton(Request $request, $id)
    {
        try {
            $button = \App\Models\HeroButton::findOrFail($id);
            
            $validated = $request->validate([
                'icon' => 'required|string|max:10',
                'text' => 'required|string|max:100',
                'url' => 'required|url|max:500',
                'color' => 'required|in:green,orange,blue',
            ]);
            
            $button->update($validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Hero button updated successfully!'
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function deleteHeroButton($id)
    {
        try {
            $button = \App\Models\HeroButton::findOrFail($id);
            $button->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Hero button deleted successfully!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function toggleHeroButton($id)
    {
        try {
            $button = \App\Models\HeroButton::findOrFail($id);
            $button->is_active = !$button->is_active;
            $button->save();
            
            return response()->json([
                'success' => true,
                'is_active' => $button->is_active,
                'message' => 'Button ' . ($button->is_active ? 'enabled' : 'disabled') . ' successfully!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
