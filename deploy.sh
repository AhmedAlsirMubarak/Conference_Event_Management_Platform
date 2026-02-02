#!/bin/bash

# SCW-APP Deployment Script
# Run this on production server after pulling latest code

echo "🚀 Starting deployment..."

# Pull latest code
echo "📥 Pulling latest code..."
git pull origin main

# Install dependencies
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader

# Run database migrations
echo "🗄️  Running migrations..."
php artisan migrate --force 2>/dev/null || true

# Fix storage permissions (CRITICAL for images)
echo "🔐 Setting storage permissions..."
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod -R 755 storage/app/public
find storage/app/public -type f -exec chmod 644 {} \;

# Create storage link for uploads
echo "📁 Creating storage symlink..."
rm -rf public/storage
php artisan storage:link



# Clear all caches
echo "🧹 Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Re-cache for production
echo "⚡ Caching for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Final optimization
echo "🎯 Optimizing application..."
php artisan optimize

echo ""
echo "Next steps:"
echo "1. Verify routes: php artisan route:list | grep strategic_committees"
echo "2. Test the application"
echo "3. Check logs: tail -f storage/logs/laravel.log"
