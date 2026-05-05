<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Icon;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $icons = [
            // Image & Media Icons
            ['icon' => '🖼️', 'name' => 'Picture Frame', 'category' => 'Image'],
            ['icon' => '📷', 'name' => 'Camera', 'category' => 'Image'],
            ['icon' => '🎨', 'name' => 'Artist Palette', 'category' => 'Image'],
            ['icon' => '🖌️', 'name' => 'Paintbrush', 'category' => 'Image'],
            ['icon' => '✏️', 'name' => 'Pencil', 'category' => 'Image'],
            ['icon' => '🎭', 'name' => 'Performing Arts', 'category' => 'Image'],
            
            // Document Icons
            ['icon' => '📄', 'name' => 'Page', 'category' => 'Document'],
            ['icon' => '📃', 'name' => 'Page with Curl', 'category' => 'Document'],
            ['icon' => '📋', 'name' => 'Clipboard', 'category' => 'Document'],
            ['icon' => '📑', 'name' => 'Bookmark Tabs', 'category' => 'Document'],
            ['icon' => '📰', 'name' => 'Newspaper', 'category' => 'Document'],
            ['icon' => '📝', 'name' => 'Memo', 'category' => 'Document'],
            ['icon' => '📖', 'name' => 'Open Book', 'category' => 'Document'],
            ['icon' => '📚', 'name' => 'Books', 'category' => 'Document'],
            ['icon' => '📕', 'name' => 'Closed Book', 'category' => 'Document'],
            
            // Gaming Icons
            ['icon' => '🎮', 'name' => 'Video Game', 'category' => 'Gaming'],
            ['icon' => '🕹️', 'name' => 'Joystick', 'category' => 'Gaming'],
            ['icon' => '🎯', 'name' => 'Direct Hit', 'category' => 'Gaming'],
            ['icon' => '🎲', 'name' => 'Game Die', 'category' => 'Gaming'],
            ['icon' => '🃏', 'name' => 'Joker', 'category' => 'Gaming'],
            ['icon' => '🎰', 'name' => 'Slot Machine', 'category' => 'Gaming'],
            
            // Technology Icons
            ['icon' => '💻', 'name' => 'Laptop', 'category' => 'Technology'],
            ['icon' => '🖥️', 'name' => 'Desktop Computer', 'category' => 'Technology'],
            ['icon' => '⌨️', 'name' => 'Keyboard', 'category' => 'Technology'],
            ['icon' => '🖱️', 'name' => 'Computer Mouse', 'category' => 'Technology'],
            ['icon' => '🖨️', 'name' => 'Printer', 'category' => 'Technology'],
            ['icon' => '📱', 'name' => 'Mobile Phone', 'category' => 'Technology'],
            ['icon' => '📲', 'name' => 'Mobile with Arrow', 'category' => 'Technology'],
            ['icon' => '💾', 'name' => 'Floppy Disk', 'category' => 'Technology'],
            ['icon' => '💿', 'name' => 'Optical Disk', 'category' => 'Technology'],
            ['icon' => '📀', 'name' => 'DVD', 'category' => 'Technology'],
            
            // Tools Icons
            ['icon' => '🔧', 'name' => 'Wrench', 'category' => 'Tools'],
            ['icon' => '🔨', 'name' => 'Hammer', 'category' => 'Tools'],
            ['icon' => '⚙️', 'name' => 'Gear', 'category' => 'Tools'],
            ['icon' => '🛠️', 'name' => 'Hammer and Wrench', 'category' => 'Tools'],
            ['icon' => '⚡', 'name' => 'High Voltage', 'category' => 'Tools'],
            ['icon' => '🔌', 'name' => 'Electric Plug', 'category' => 'Tools'],
            ['icon' => '🔋', 'name' => 'Battery', 'category' => 'Tools'],
            
            // Business Icons
            ['icon' => '💼', 'name' => 'Briefcase', 'category' => 'Business'],
            ['icon' => '📊', 'name' => 'Bar Chart', 'category' => 'Business'],
            ['icon' => '📈', 'name' => 'Chart Increasing', 'category' => 'Business'],
            ['icon' => '📉', 'name' => 'Chart Decreasing', 'category' => 'Business'],
            ['icon' => '💰', 'name' => 'Money Bag', 'category' => 'Business'],
            ['icon' => '💵', 'name' => 'Dollar Banknote', 'category' => 'Business'],
            ['icon' => '💳', 'name' => 'Credit Card', 'category' => 'Business'],
            ['icon' => '🏪', 'name' => 'Convenience Store', 'category' => 'Business'],
            ['icon' => '🏢', 'name' => 'Office Building', 'category' => 'Business'],
            
            // Communication Icons
            ['icon' => '📧', 'name' => 'Email', 'category' => 'Communication'],
            ['icon' => '📨', 'name' => 'Incoming Envelope', 'category' => 'Communication'],
            ['icon' => '📩', 'name' => 'Envelope with Arrow', 'category' => 'Communication'],
            ['icon' => '📬', 'name' => 'Open Mailbox', 'category' => 'Communication'],
            ['icon' => '📮', 'name' => 'Postbox', 'category' => 'Communication'],
            ['icon' => '📞', 'name' => 'Telephone Receiver', 'category' => 'Communication'],
            ['icon' => '☎️', 'name' => 'Telephone', 'category' => 'Communication'],
            ['icon' => '📟', 'name' => 'Pager', 'category' => 'Communication'],
            
            // Security Icons
            ['icon' => '🔒', 'name' => 'Locked', 'category' => 'Security'],
            ['icon' => '🔓', 'name' => 'Unlocked', 'category' => 'Security'],
            ['icon' => '🔐', 'name' => 'Locked with Key', 'category' => 'Security'],
            ['icon' => '🔑', 'name' => 'Key', 'category' => 'Security'],
            ['icon' => '🗝️', 'name' => 'Old Key', 'category' => 'Security'],
            ['icon' => '🛡️', 'name' => 'Shield', 'category' => 'Security'],
            
            // Design Icons
            ['icon' => '🎨', 'name' => 'Artist Palette', 'category' => 'Design'],
            ['icon' => '🖍️', 'name' => 'Crayon', 'category' => 'Design'],
            ['icon' => '✂️', 'name' => 'Scissors', 'category' => 'Design'],
            ['icon' => '📐', 'name' => 'Triangular Ruler', 'category' => 'Design'],
            ['icon' => '📏', 'name' => 'Straight Ruler', 'category' => 'Design'],
            ['icon' => '🖼️', 'name' => 'Framed Picture', 'category' => 'Design'],
            
            // Miscellaneous
            ['icon' => '⭐', 'name' => 'Star', 'category' => 'Misc'],
            ['icon' => '✨', 'name' => 'Sparkles', 'category' => 'Misc'],
            ['icon' => '🔥', 'name' => 'Fire', 'category' => 'Misc'],
            ['icon' => '💡', 'name' => 'Light Bulb', 'category' => 'Misc'],
            ['icon' => '🎁', 'name' => 'Wrapped Gift', 'category' => 'Misc'],
            ['icon' => '🎉', 'name' => 'Party Popper', 'category' => 'Misc'],
            ['icon' => '🎊', 'name' => 'Confetti Ball', 'category' => 'Misc'],
            ['icon' => '🏆', 'name' => 'Trophy', 'category' => 'Misc'],
            ['icon' => '🥇', 'name' => 'Gold Medal', 'category' => 'Misc'],
            ['icon' => '🎖️', 'name' => 'Military Medal', 'category' => 'Misc'],
            ['icon' => '🔔', 'name' => 'Bell', 'category' => 'Misc'],
            ['icon' => '🔖', 'name' => 'Bookmark', 'category' => 'Misc'],
            ['icon' => '📌', 'name' => 'Pushpin', 'category' => 'Misc'],
            ['icon' => '📍', 'name' => 'Round Pushpin', 'category' => 'Misc'],
            ['icon' => '🎯', 'name' => 'Bullseye', 'category' => 'Misc'],
        ];

        foreach ($icons as $icon) {
            Icon::create($icon);
        }

        $this->command->info('✅ Icons seeded successfully!');
        $this->command->info('   - ' . count($icons) . ' icons created');
    }
}
