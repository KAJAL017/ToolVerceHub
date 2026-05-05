#!/bin/bash

echo "========================================="
echo "ToolHub - Production Deployment Script"
echo "========================================="
echo ""

# Install dependencies
echo "📦 Installing Composer dependencies..."
composer install --optimize-autoloader --no-dev

# Clear all caches
echo "🧹 Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run migrations
echo "🗄️  Running database migrations..."
php artisan migrate --force

# Seed icons if needed
echo "🎨 Seeding icons..."
php artisan db:seed --class=IconSeeder --force
php artisan db:seed --class=AdditionalIconsSeeder --force

# Optimize for production
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Set permissions
echo "🔐 Setting folder permissions..."
chmod -R 775 storage
chmod -R 775 bootstrap/cache

echo ""
echo "✅ Deployment completed successfully!"
echo ""
echo "Next steps:"
echo "1. Update .env file with production settings"
echo "2. Visit your website to verify"
echo "3. Login to admin panel and change password"
echo ""
