<?php
// Quick test to check if buttons are loading
// Run this: php test_buttons.php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Testing Hero Buttons...\n\n";

$buttons = \App\Models\HeroButton::all();

echo "Total Buttons: " . $buttons->count() . "\n\n";

foreach ($buttons as $button) {
    echo "ID: {$button->id}\n";
    echo "Icon: {$button->icon}\n";
    echo "Text: {$button->text}\n";
    echo "URL: {$button->url}\n";
    echo "Color: {$button->color}\n";
    echo "Active: " . ($button->is_active ? 'Yes' : 'No') . "\n";
    echo "---\n";
}
