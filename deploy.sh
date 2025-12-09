#!/bin/bash

# SCW-APP Deployment Script
# Run this on production server after pulling latest code

echo "🚀 Starting deployment..."

# Install/update dependencies
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader

# Run database migrations
echo "🗄️  Running migrations..."
php artisan migrate --force

# Create storage link for uploads
echo "📁 Creating storage symlink..."
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

echo "✅ Deployment complete!"
echo ""
echo "Next steps:"
echo "1. Verify routes: php artisan route:list | grep strategic_committees"
echo "2. Test the application"
echo "3. Check logs: tail -f storage/logs/laravel.log"
