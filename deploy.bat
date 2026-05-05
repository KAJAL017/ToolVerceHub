@echo off
echo =========================================
echo ToolHub - Production Deployment Script
echo =========================================
echo.

REM Install dependencies
echo Installing Composer dependencies...
call composer install --optimize-autoloader --no-dev

REM Clear all caches
echo Clearing caches...
call php artisan cache:clear
call php artisan config:clear
call php artisan route:clear
call php artisan view:clear

REM Run migrations
echo Running database migrations...
call php artisan migrate --force

REM Seed icons if needed
echo Seeding icons...
call php artisan db:seed --class=IconSeeder --force
call php artisan db:seed --class=AdditionalIconsSeeder --force

REM Optimize for production
echo Optimizing for production...
call php artisan config:cache
call php artisan route:cache
call php artisan view:cache
call php artisan optimize

echo.
echo Deployment completed successfully!
echo.
echo Next steps:
echo 1. Update .env file with production settings
echo 2. Visit your website to verify
echo 3. Login to admin panel and change password
echo.
pause
